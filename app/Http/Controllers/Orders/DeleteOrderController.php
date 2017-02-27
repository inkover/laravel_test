<?php

namespace App\Http\Controllers\Orders;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteOrderController extends Controller
{
	public function deleteOrder(Request $request) {
		$this->delete($request->segment(2));
		return redirect('/');
	}

	private function delete($orderId) {
		$order = Order::where('id', $orderId)->where('user_id', Auth::user()->id)->firstOrFail();
		$order->delete();
	}
}
