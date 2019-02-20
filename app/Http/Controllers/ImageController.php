<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'img1' => 'required|image|mimes:jpeg,jpg,png',
            'img2' => 'required|image|mimes:jpeg,jpg,png',
            'price' => 'required|min:0'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->material = $request->material;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->collection_id = $request->collection_id;
        $product->save();

        if($request->hasFile('img1') && $request->hasFile('img2')) {
            // dd($request);
            for ($i=1; $i<=2; $i++) {
                $file = $request->file('img'.$i);

                // get filename with extension
                // $filenamewithextension = $request->file('img'.$i)->getClientOriginalName();
         
                // //get filename without extension
                // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         
                //get file extension
                $extension = $file->getClientOriginalExtension();
         
                //filename to store
                $filenametostore = $product->product_id.'-'.$i.'.'.$extension;

                //Upload File
                // $file->storeAs('public/product', $filenametostore);
                // $file->storeAs('public/product/thumbnail', $filenametostore);
                
                $path = public_path('storage/product/');

                $dimensions = ['500', '200'];
                foreach ($dimensions as $row) {
                    $canvas = Image::canvas($row, $row);
                    //Resize image here
                    $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    
                    $canvas->insert($resizeImage, 'center');
                    if ($row == 500) {
                        $canvas->save($path . $filenametostore);
                    } elseif ($row == 200) {
                        $canvas->save($path . 'thumbnail/' . $filenametostore);
                    }
                }
                
                // $thumbnailpath = public_path('storage/product/thumbnail/'.$filenametostore);
                // $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                //     $constraint->aspectRatio();
                // });
                // $img->save($thumbnailpath);


                // $canvasTn->insert($newTn, 'center');

                // $canvasTn->save($path . 'thumbnail/', $filenametostore);
            }
     
            return redirect()->back()->with('success', "Image uploaded successfully.");
        } else {
            return redirect()->back()->with('failed', "Image failed to upload.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
