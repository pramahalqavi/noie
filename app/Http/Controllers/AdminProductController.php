<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Collection;
use App\Models\Product;

class AdminProductController extends Controller
{

	public function index() {
    	
    	$years = Collection::distinct()->orderBy('year', 'desc')->get(['year']);

    	$collections = Collection::orderBy('year', 'desc')->orderBy('id')->get();
    	// dd($collections);

		return view('admin-side/adminProduct', ['years' => $years, 'collections' => $collections]);
	}

	public function show($id) {
		
		$collection = Collection::find($id);

		$products = Product::where('collection_id', $id)->orderBy('name')->get();
		// dd($products);

		return view('admin-side/productEdit', ['collection' => $collection, 'products' => $products]);
	}

	public function store(Request $request)
    {
    	// dd($request);

        $collection1 = new Collection;
		$collection1->year = $request->year;
		$collection1->name = $request->collection1;
		$collection1->save();

		$collection2 = new Collection;
		$collection2->year = $request->year;
		$collection2->name = $request->collection2;
		$collection2->save();

		$collection3 = new Collection;
		$collection3->year = $request->year;
		$collection3->name = $request->collection3;
		$collection3->save();

		$collection4 = new Collection;
		$collection4->year = $request->year;
		$collection4->name = $request->collection4;
		$collection4->save();

		return redirect('admin/product')->with('success', 'Collection per year successfully added');
    }

    public function update(Request $request, $id) {

    	// $p = Product::find($request->id);
    	// if ($request->hasFile())

    }

    public function destroy(Request $request, $id) {

    	// dd($request);

    	$product = Product::find($request->id);
    	$product->delete();

    	return redirect()->back()->with('success', 'Product successfully deleted');
    }

}
