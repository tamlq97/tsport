<?php

namespace App\Http\Controllers\Auth_Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @param AuthRepositoryInterface $authRepository
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = $this->guard()->attempt($credentials)) {
            return response()->json(['error' => 'Emaill or password not valid.'], 401);
        }
        return $this->respondWithToken($token);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        $loads = [];
        $user = $this->guard()->user();
        if ($user->hasRole('customer')) {
            array_push($loads, 'customer');
            $user['avatarLink'] = asset('storage/customers/' . $user->id . '/');
        }
        if ($user->hasRole('supplier')) {
            array_push($loads, 'supplier');
            $user['logoLink'] = asset('storage/suppliers/' . $user->id . '/');
        }
        $user['userAvatarLink'] = asset('storage/users/' . $user->id . '/image/');
        return response()->json($user->load($loads));
    }

    public function me1(Request $request)
    {
        $loads = [];
        $user = $this->guard()->user();
        if ($user->hasRole('customer')) {
            array_push($loads, 'customer');
            $user['avatarLink'] = asset('storage/customers/' . $user->id . '/');
        }
        if ($user->hasRole('supplier')) {
            array_push($loads, 'supplier');
            $user['logoLink'] = asset('storage/suppliers/' . $user->id . '/');
        }
        $user['userAvatarLink'] = asset('storage/users/' . $user->id . '/image/');
        return response()->json(['user' => $user->load($loads)]);
    }

    public function update(AuthUpdateRequest $request, User $user)
    {
        if (Gate::denies('edit_user')) return abort(401);
        Log::warning("AAA",[$user->can('delete_user')]);
//        if($request->oldPsw){
//            if (Hash::check($request->oldPsw, $user->password)){
//                $password = Hash::make($request->password);
//                $user->update(['name' => $request->name,'password' => $password]);
//                return response()->json(['message' => 'Successful update info!','user' => $user]);
//            }
//            else return response()->json(['message'=>'Invalid credentials.'],422);
//        }
//        $user->update(['name'=>$request->name]);
//        $loads = [];
//        if ($user->hasRole('customer')) {
//            array_push($loads, 'customer');
//            $user['avatarCustLink'] = asset('storage/customers/' . $user->id . '/');
//        }
//        if ($user->hasRole('supplier')) {
//            array_push($loads, 'supplier');
//            $user['logoSuplLink'] = asset('storage/suppliers/' . $user->id . '/');
//        }
//        $user->load($loads);
        return response()->json(['message' => 'Successful update info!', 'user' => $user]);
    }

    public function changePassword(Request $request, User $user)
    {
        if (Gate::denies('edit_user')) return abort(401);
        $validator = $this->validate($request, [
            'oldPsw' => 'required',
            'newPsw' => 'required|same:confirmPsw',
        ]);
        if (Hash::check($validator['oldPsw'], $user->password)) {
            $user->update(['password' => Hash::make($validator['newPsw'])]);
            return response()->json(['message' => 'Successful update password!', 'data' => $user]);
        } else {
            return response()->json(
                ['error' => 'Old password not matched.'],
                422
            );
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $cookie = Cookie::forget('_token');
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out'])->withCookie($cookie);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $cookie = $this->getCookieDetails($token);
        $user = $this->guard()->user();
        $user['supplier'] = $user->supplier;
        $user['role_name'] = $user->roles->pluck('name');
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
            'user' => $user,
        ])
            ->cookie($cookie['name'], $cookie['value'], $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly'], $cookie['samesite']);
    }

    private function getCookieDetails($token)
    {
        return [
            'name' => '_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            // 'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'samesite' => false,
        ];
    }

    public function guard()
    {
        return auth()->guard('api');
    }
}
