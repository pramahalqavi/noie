<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Collection;

class AdminProductController extends Controller
{

	public function index() {
    	
    	$years = Collection::distinct()->orderBy('year', 'desc')->get(['year']);
    	// dd($collections);

		return view('admin-side/adminProduct', ['years' => $years]);
	}


}
