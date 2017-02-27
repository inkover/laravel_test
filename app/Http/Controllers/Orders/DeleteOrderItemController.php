<?php

namespace App\Http\Controllers\Orders;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteOrderItemController extends Controller
{

	public function deleteItem(Request $request) {
		$this->delete($request->segment(2), $request->segment(4));
		return redirect('/');
	}

	private function delete($orderId, $orderItemId) {
		$order = Order::where('id', $orderId)->where('user_id', Auth::user()->id)->firstOrFail();
		$orderItem = OrderItem::where('id', $orderItemId)->where('order_id', $order->id)->firstOrFail();
		$orderItem->delete();
	}
}
