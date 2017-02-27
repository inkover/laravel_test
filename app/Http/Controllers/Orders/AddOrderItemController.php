<?php

namespace App\Http\Controllers\Orders;

use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddOrderItemController extends Controller
{
	public function createItem(Request $request) {
		$this->create($request->segment(2), $request->all());
		return redirect('/');
	}

	private function create($orderId, $data) {
		$productId = $data['product_id'];
		$order = Order::where('id', $orderId)->where('user_id', Auth::user()->id)->firstOrFail();
		$product = Product::findOrFail($productId);
		$orderItem = OrderItem::where('order_id', $orderId)->where('product_id', $productId)->first();
		if (is_null($orderItem)) {
			$orderItem = new OrderItem();
			$orderItem->order_id = $order->id;
			$orderItem->product_id = $product->id;
		}
		$orderItem->quantity ++;
		$orderItem->save();
	}
}
