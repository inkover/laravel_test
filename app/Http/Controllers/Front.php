<?php

	namespace App\Http\Controllers;

	use App\Product;
	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Request;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Support\Facades\Auth;

	class Front extends Controller {

		var $brands;
		var $categories;
		var $products;
		var $title;
		var $description;

		public function __construct() {
		}

		public function index() {
			return view('home', [
				'user' => Auth::user(),
				'products' => Product::all()
			]);
		}
	}