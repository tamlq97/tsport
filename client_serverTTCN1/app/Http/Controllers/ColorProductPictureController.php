<?php

namespace App\Http\Controllers;

use App\ColorProductPicture;
use App\Http\Requests\ProductImageRequest;
use App\Http\Resources\Product\Color\Picture\PictureCollection;
use App\Product;
use App\Services\ColorProductPictureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Product\Product as ProductResource;
use ColorSize;
use Illuminate\Support\Facades\DB;

class ColorProductPictureController extends Controller
{
    public static $imageExt = ['jpg', 'jpe', 'png', 'gif', 'web'];
    public static $videoExt = ['mp4', '3gp', 'mpg', 'mpeg', 'mpv', 'ogv', 'ogg', 'flv', 'webm'];
    /**
     * Fetch files by Type or Id
     * @param string $type File type
     * @param integer $id ProductPicture Id
     * @return object        ProductPictures list, JSON
     */
    // public function index($type, $id = null)
    public function index()
    {
        // return new PictureCollection(ColorProductPicture::all());
        // $model = new ColorProductPicture();
        // return $model->all();
        // // if (!is_null($id)) {
        // //     $response = $model::findOrFail($id);
        // // } else {
        // $records_per_page = ($type == 'video') ? 6 : 15;

        // $files = $model::where('type', $type)
        //     ->where('product_id', $id)
        //     ->orderBy('id', 'desc')->paginate($records_per_page);

        // $response = [
        //     'pagination' => [
        //         'total' => $files->total(),
        //         'per_page' => $files->perPage(),
        //         'current_page' => $files->currentPage(),
        //         'last_page' => $files->lastPage(),
        //         'from' => $files->firstItem(),
        //         'to' => $files->lastItem()
        //     ],
        //     'data' => $files
        // ];
        // // }

        // return response()->json($response);
    }

    /**
     * Upload new file and store it
     * @param Request $request Request with form data: filename and file info
     * @return boolean          True if success, otherwise - false
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_pictures',
            'file' => 'required|file|mimes:' . ColorProductPicture::getAllExtensions() . '|max:' . ColorProductPicture::getMaxSize()
        ]);

        $file = new ColorProductPicture();

        $uploaded_file = $request->input('file');
        $original_ext = $uploaded_file->getClientOriginalExtension();
        $type = $file->getType($original_ext);

        // if ($file->upload($type, $uploaded_file, $request['name'], $original_ext)) {
        return $file::create([
            'name' => $request['name'],
            'type' => $type,
            'extension' => $original_ext,
            'product_id' => $request->product_id
        ]);
        // }

        return response()->json(false);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProductPicture $colorProductPicture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $product_id, $color_id)
    {
        $productPictures = \App\ColorProductPicture::where('color_product_pictures.color_id', '=', $color_id)
            ->where('color_product_pictures.product_id', '=', $product_id)
            ->get();
        return new PictureCollection($productPictures);
    }

    /**
     * Edit specific file
     * @param integer $id File Id
     * @param Request $request Request with form data: filename
     * @return boolean           True if success, otherwise - false
     */
    public function update(ColorProductPicture $colorProductPicture, Request $request)
    {
        //        $file = ColorProductPicture::where('id', $colorProductPicture->id)->where('user_id', Auth::id())->first();

        if ($colorProductPicture->name == $request['name']) {
            return response()->json(false);
        }

        $this->validate($request, [
            'name' => 'required|unique:product_pictures'
        ]);

        // $old_filename = $colorProductPicture->getName($colorProductPicture->type, $colorProductPicture->name, $colorProductPicture->extension);
        // $new_filename = $colorProductPicture->getName($request['type'], $request['name'], $request['extension']);

        // if (Storage::disk('local')->exists($old_filename)) {
        //     if (Storage::disk('local')->move($old_filename, $new_filename)) {
        //         $colorProductPicture->name = $request['name'];
        //         return response()->json($colorProductPicture->save());
        //     }
        // }

        return response()->json(false);
    }


    /**
     * Delete file from disk and database
     * @param integer $id File Id
     * @return boolean      True if success, otherwise - false
     */
    public function destroy(ColorProductPicture $colorProductPicture)
    {
        return response()->json(false);
    }

    public function getType($ext)
    {
        if (in_array($ext, self::$imageExt)) {
            return 'image';
        }
        if (in_array($ext, self::$videoExt)) {
            return 'video';
        }
    }

    public function updateOrCreate($image)
    {
        $src = $image['src'] ?? $image['name'];
        if($type = $this->getType($image['ext'])){
            ColorProductPicture::updateOrCreate([
                'name' => $image['name'],
                'src' => $src,
                'extension' => $image['ext'],
                'type' => $type,
                'color_id' => $image['color_id'],
                'product_id' => $image['product_id']
            ]);
        }
    }

    public function addImageForProductColor(ProductImageRequest $request, $product_id, $color_id, ColorProductPictureService $colorProductPictureService)
    {
        $imageType = $request->imageType;
        $credentials = $request->all();
        if ($imageType === 'file') {
            foreach ($credentials['image'] as $key => $file) {
                $picture = new ColorProductPicture();
                $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $type = $picture->getType($extension);
                if (!File::exists($picture->getNameDir($product_id, $color_id, $type, $name, $extension))) {
                    $picture->storeFile($file, $product_id, $color_id, $type, $name, $extension);
                }
                $src = $name . '.' . $extension;
                $image = array('name' => $name, 'src' => $src,'ext' =>$extension, 'color_id' => $color_id, 'product_id' => $product_id);
                $this->updateOrCreate($image);
            }
        } else if ($imageType === 'url') {
            $images = $colorProductPictureService->getImages($credentials['image']);
            foreach ($images as $img) {
                $ext = $colorProductPictureService->getImageExt($img);
                $image = array('name' => $img,'ext' => $ext, 'color_id' => $color_id, 'product_id' => $product_id);
                $this->updateOrCreate($image);
            }
        }
        array_map(function ($value) use ($color_id) {
            return \App\ColorSize::updateOrCreate(
                ['name' => $value['name'], 'color_id' => $color_id],
                ['name' => $value['name'], 'color_id' => $color_id, 'quantity' => 0]
            );
        }, $credentials['size']);
        return response()->json(['message' => 'Successful store image!']);
    }

    public function deleteSelectedItem(Request $request)
    {
        $ids = [];
        $data = $request->all();
        foreach ($data as $key => $value) {
            array_push($ids, $value['id']);
            $path = storage_path('app/public/products/' . $value['product_id']
                . '/colors/' . $value['color_id'] . '/' . $value['type'] . '/' . $value['src']);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        ColorProductPicture::destroy($ids);
        return response()->json(['message' => 'Your selected image has been deleted.']);
    }
}
