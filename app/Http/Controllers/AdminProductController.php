<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Collection;

class AdminProductController extends Controller
{

	public function index() {
    	
    	$years = Collection::distinct()->orderBy('year', 'desc')->get(['year']);

    	$collections = Collection::orderBy('year', 'desc')->get();
    	// dd($collections);

		return view('admin-side/adminProduct', ['years' => $years, 'collections' => $collections]);
	}

	public function addYear(Request $request) {
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

		return redirect('admin/product');
	}

}
