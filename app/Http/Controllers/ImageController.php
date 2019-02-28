<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use File;

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
        // dd($request);
        $this->validate($request, [
            'img1' => 'required|image|mimes:jpeg,jpg,png',
            'img2' => 'required|image|mimes:jpeg,jpg,png',
            'price' => 'required|min:0'
        ]);
        $product = new Product;
        if ($request->size != '') {
            $product->size = $request->size;
        }
        $product->name = $request->name;
        if ($request->material != '') {
            $product->material = $request->material;
        }
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
                
                $path = public_path('storage/product');

                //JIKA FOLDERNYA BELUM ADA
                if (!File::isDirectory($path)) {
                    //MAKA FOLDER TERSEBUT AKAN DIBUAT
                    File::makeDirectory($path);
                }

                if (!File::isDirectory($path.'/thumbnail')) {
                    //MAKA FOLDER TERSEBUT AKAN DIBUAT
                    File::makeDirectory($path.'/thumbnail');
                }

                $dimensions = ['600', '200'];
                foreach ($dimensions as $row) {
                    if ($row==600) {
                        $canvas = Image::canvas($row, 500);
                        //Resize image here
                        $resizeImage  = Image::make($file)->resize($row, 500, function($constraint) {
                            $constraint->aspectRatio();
                        });
                        $canvas->insert($resizeImage, 'center');
                        $canvas->save($path . '/' . $filenametostore);
                    } elseif ($row==200) {
                        $canvas = Image::canvas($row, 150);
                        //Resize image here
                        $resizeImage  = Image::make($file)->resize($row, 150, function($constraint) {
                            $constraint->aspectRatio();
                        });
                        $canvas->insert($resizeImage, 'center');
                        $canvas->save($path . '/thumbnail/' . $filenametostore);
                    }
                }
                
                $updt = Product::find($product->product_id);
                // dd($updt);
                if ($i==1) {
                    $updt->image1 = 'storage/product/' . $filenametostore;
                    $updt->thumbnail1 = 'storage/product/thumbnail/' . $filenametostore;
                } elseif ($i==2) {
                    $updt->image2 = 'storage/product/' . $filenametostore;
                    $updt->thumbnail2 = 'storage/product/thumbnail/' . $filenametostore;
                }
                $updt->save();
            }
     
            return redirect()->back()->with('success', "Product successfully added");
        } else {
            return redirect()->back()->with('failed', "Image failed to upload");
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
        // dd($request);
        $this->validate($request, [
            'img1' => 'image|mimes:jpeg,jpg,png',
            'img2' => 'image|mimes:jpeg,jpg,png',
            'name' => 'required|min:0',
            'price' => 'required|min:0'
        ]);

        $product = Product::find($id);
        if ($request->size != '') {
            $product->size = $request->size;
        } else {
            $product->size = "-";
        }
        if ($request->name != '') {
            $product->name = $request->name;
        }
        if ($request->material != '') {
            $product->material = $request->material;
        } else {
            $product->material = "-";
        }
        if ($request->price != '') {
            $product->price = $request->price;
        }
        $product->save();

        for ($i=1; $i<=2; $i++) {
            if (!$request->hasFile('img'.$i)) {
                continue;
            }
            $file = $request->file('img'.$i);
            
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $product->product_id.'-'.$i.'.'.$extension;

            //Upload File
            // $file->storeAs('public/product', $filenametostore);
            // $file->storeAs('public/product/thumbnail', $filenametostore);
            
            $path = public_path('storage/product');

            //JIKA FOLDERNYA BELUM ADA
            if (!File::isDirectory($path)) {
                //MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory($path);
            }

            if (!File::isDirectory($path.'/thumbnail')) {
                //MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory($path.'/thumbnail');
            }

            $dimensions = ['600', '200'];
            foreach ($dimensions as $row) {
                if ($row==600) {
                    $canvas = Image::canvas($row, 500);
                    //Resize image here
                    $resizeImage  = Image::make($file)->resize($row, 500, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $canvas->insert($resizeImage, 'center');
                    $canvas->save($path . '/' . $filenametostore);
                } elseif ($row==200) {
                    $canvas = Image::canvas($row, 150);
                    //Resize image here
                    $resizeImage  = Image::make($file)->resize($row, 150, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $canvas->insert($resizeImage, 'center');
                    $canvas->save($path . '/thumbnail/' . $filenametostore);
                }
            }
            
            $updt = Product::find($product->product_id);
            // dd($updt);
            if ($i==1) {
                $updt->image1 = 'storage/product/' . $filenametostore;
                $updt->thumbnail1 = 'storage/product/thumbnail/' . $filenametostore;
            } elseif ($i==2) {
                $updt->image2 = 'storage/product/' . $filenametostore;
                $updt->thumbnail2 = 'storage/product/thumbnail/' . $filenametostore;
            }
            $updt->save();
        }
        
        return redirect()->back()->with('success', "Product successfully updated");
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
