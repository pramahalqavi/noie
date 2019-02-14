<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Collection;

class AdminProductController extends Controller
{

	public function index() {
    	
    	$collections = Collection::orderBy('year', 'desc')->get();
    	// dd($collections);

		return view('admin-side/adminProduct', ['rows' => $collections]);
	}


}
