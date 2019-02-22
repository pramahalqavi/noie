<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Product;

class ProductController extends Controller {
    public function index($collection_id) {
    	$collection = Collection::find($collection_id);

    	$products = Product::where('collection_id', $collection_id)->get();

        return view('user-side/products', ['collection' => $collection, 'products' => $products]);
    }
}
