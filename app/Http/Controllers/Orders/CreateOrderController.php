<?php

	namespace App\Http\Controllers\Orders;

	use App\Order;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use App\Http\Controllers\Controller;

	class CreateOrderController extends Controller {


		public function createOrder(Request $request) {
			$this->create();
			return redirect('/');
		}

		private function create() {
			Order::create([
				'user_id' => Auth::user()->id
			]);
		}

	}
