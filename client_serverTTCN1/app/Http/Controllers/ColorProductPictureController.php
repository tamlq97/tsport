<?php

namespace App\Http\Controllers;

use App\ColorProductPicture;
use App\Http\Resources\Product\Color\Picture\PictureCollection;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Product\Product as ProductResource;
use ColorSize;
use Illuminate\Support\Facades\DB;

class ColorProductPictureController extends Controller
{
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
     * @param  Request $request Request with form data: filename and file info
     *
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
     * @param  \App\ProductPicture  $colorProductPicture
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
     * @param  integer  $id      File Id
     * @param  Request $request  Request with form data: filename
     * d01565c38da852f65c810cb39fdf
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
     * @param  integer $id  File Id
     * @param integer $id File Id
     * @return boolean      True if success, otherwise - false
     */
    public function destroy(ColorProductPicture $colorProductPicture)
    {
        return response()->json(false);
    }

    public function addImageForProductColor(Request $request, $product_id, $color_id)
    {
        $imageType = $request->imageType;
        if ($imageType == 'file') {
            $credentials = $this->validate($request, [
                'size' => 'array|required',
                'color_name' => 'required',
                'image' => 'array',
                'image.*' => 'required|mimes:jpg,jpeg,png,webp|max:20000',
            ]);

            foreach ($credentials['image'] as $key => $file) {
                $picture = new ColorProductPicture();
                $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $type = $picture->getType($extension);
                if (!File::exists($picture->getNameDir($product_id, $color_id, $type, $name, $extension))) {
                    $picture->storeFile($file, $product_id, $color_id, $type, $name, $extension);
                }
                $picture::updateOrCreate([
                    'name' => $name,
                    'src' => $name . '.' . $extension,
                    'type' => $type,
                    'extension' => $extension,
                    'color_id' => $color_id,
                    'product_id' => $product_id
                ]);
            }

            foreach ($credentials['size'] as $key => $size) {
                \App\ColorSize::updateOrCreate([
                    'color_id' => $color_id, 'name' => $size['name'],
                ], ['color_id' => $color_id, 'name' => $size['name'], 'quantity' => 0]);
            }

            return response()->json(['message' => "Successful store image."]);
        } else if ($imageType == 'url') {
            $credentials = $this->validate($request, [
                'size' => 'array|required',
                'color_name' => 'required',
                'image' => 'string',
            ]);
            $images = explode(',', $credentials['image']);
            $images = implode('', $images);
            $images = explode('https', $images);
            foreach ($images as $img) {
                $temp = explode('.', $img);
                $ext = substr($temp[count($temp) - 1], 0, 3);
                $ext = $ext == 'jpe' ? 'jpeg' : ($ext == 'web' ? 'webp' : $ext);
                if (in_array($ext, ['jpg', 'jpe', 'png', 'gif', 'web'])) {
                    ColorProductPicture::updateOrCreate([
                        'name' => $img,
                        'src' => $img,
                        'extension' => $ext,
                        'type' => 'image',
                        'color_id' => $color_id,
                        'product_id' => $product_id
                    ]);
                }
                if (in_array($ext, ['mp4'])) {
                    ColorProductPicture::updateOrCreate([
                        'name' => $img,
                        'src' => $img,
                        'extension' => $ext,
                        'type' => 'video',
                        'color_id' => $color_id,
                        'product_id' => $product_id
                    ]);
                }
            }

            foreach ($credentials['size'] as $key => $value) {
                \App\ColorSize::updateOrCreate(
                    ['name' => $value['name'], 'color_id' => $color_id],
                    ['name' => $value['name'], 'color_id' => $color_id, 'quantity' => 0]
                );
            }
            return response()->json(['message' => 'Successful store image!']);
        }
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
