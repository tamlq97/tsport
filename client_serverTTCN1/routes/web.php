<?php

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Resources\Category\SubCategoryCollection;
use App\Http\Resources\Product\Product as ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\SubCategory;
use App\Supplier;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Analytics as Analytic;
use App\Customer;
use App\Http\Resources\Product\Color\Picture\PictureCollection;
use App\Mail\OrderConfirmed;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Analytics\Period;

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

Route::get('/', function () {
    $order = Order::find(188);
    $order->load(['customer', 'detail']);
    return $order;
    // $data = DB::table("customers")
    // ->whereBetween('created_at',['2020-04-31','2020-06-1'])
    // ->get();
    // return $data;
    return view('welcome');
});

Route::get('/order1', function () {
    $order =  Order::where('madh', 'A622b9f')->first();
    $order->load('detail.product.supplier');
    return $order;
});

Route::get('/removeRole', function () {
    return Supplier::where('user_id', 141)->first()->user->removeRole('supplier');
});
Route::get('/product1', function () {
    return Product::find(727)->first()->supplier;
});

Route::get('/products/{product_id}/colors/{color_id}', 'ColorProductPictureController@show');
Route::get('/{product}', function (Product $product) {
    // $ids = \App\SubCategory::select('id')->where('category_id', 1)->get();
    $product->load('categories');
    $ids = [];
    foreach ($product->categories as $v) {
        array_push($ids, $v['id']);
    }
    return Product::select('products.*')
        ->join('product_category', 'product_category.product_id', '=', 'products.id')
        ->join('sub_categories', 'product_category.sub_category_id', '=', 'sub_categories.id')
        ->whereIn('sub_categories.id', [3, 6, 4])
        ->with(['categories', 'colors.sizes', 'colors.pictures', 'colors', 'supplier'])
        ->limit(15)
        ->get();
    // return Product::join('product_category as pc', 'pc.product_id', '=', 'products.id')
    //     ->join('sub_categories as sc', 'pc.sub_category_id', '=', 'sc.id')
    //     ->where('sc.category_id', '=', 1)
    //     ->with(['categories'])
    //     ->paginate(25);
    // $product = Product::all();
    // foreach ($product as $key => $value) {
    //     $value->update(['slug' => Illuminate\Support\Str::slug($value->product_name)]);
    // }
    // return 'done';
    $products = Product::with(['colors' => function ($query) {
        $query->where('name', 'black');
    }, 'colors.pictures', 'colors.sizes', 'supplier', 'categories'])->get();
    return $products;
});
Route::get('craw', function () {
    $url = 'https://www.gymshark.com/products/gymshark-premium-baselayer-shorts-light-grey';
    // $crawler = GoutteFacade::request('get', env('GYM_SHARK') . $url);
    $crawler = \Weidner\Goutte\GoutteFacade::request('get', $url);
    $name = $crawler->filter('.pdp  .pdp__content  .pdp__content__info.pinfo .pinfo__heading')
        ->each(function ($node) {
            return $node->text();
        });
    $pImages = $crawler->filter('.pdp  .pdp__content  .pdp__content__images  .pimages.pimages--6.preloader
        article.pimages__image.pimages__image--image')
        ->each(function ($node) {
            // print($node->text());
            return $node->attr('data-image');
        });
    $data = ['name' => $name, 'image' => implode(',', $pImages)];
    dump($name);
    // $products = Product::with(['colors', 'colors.pictures', 'colors.sizes', 'supplier'])->get();
    // // return $products;
    // return new ProductResource($products);
});


Route::post('upload', function (Request $request) {
    // $image = $request->file('image');

    // $validator = Validator::make($request->all(),[
    //     'image' => 'required|mimetypes:video/avi,video/mp4,video/mpeg,video/quicktime'

    // ]);
    // if($validator->fails()){
    //     return response()->json(['message'=> 'failt']);
    // }
    $data = [];
    $image = $request->image;
    $data['name'] = $image->getClientOriginalName();
    dd($data);

    // $path = $image->storeAs('products', $image->getClientOriginalName());
    // return redirect()->back()->with('path', $path);
})->name('upload');

Route::get('slug', function () {
    return Illuminate\Support\Str::slug('T-Shirts & Tops');
});

Route::get('assignCategoryForProduct', function () {
    $product = Product::all();
    foreach ($product as $prod) {
        $prod->category_id = random_int(2, 30);
        $prod->size_id = random_int(1, 5);
        $prod->color_id = random_int(1, 5);
        $prod->save();
    }
    return 'done';
});



Route::get('getAllFileInADirectory', function () {
    // return public_path();
    $path = storage_path('app/public/products/' . 1);
    $filesProdInStorage = File::allFiles(storage_path('app/public/products/' . 1));
    return gettype($filesProdInStorage);
    // foreach ($files as $file) {
    //     if ($file->getFilename() == 'ENERGY_SEAMLESS_SHORTS_BLACK.C-Edit.webp') {
    //         dd($file);
    //     }
    // }
});

Route::get('deleteDirectory', function () {
    $path = storage_path('app/public/products/117');
    // return $path;
    return File::deleteDirectory($path);
});


Route::get('product/{product}', function ($product) {
    return Product::with('images')->select(['products.product_name', 'products.id'])->find($product);
});
