<?php

namespace App\Http\Controllers\Orders;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecalcOrderController extends Controller
{
	public function recalcOrder(Request $request) {
		$this->recalc($request->segment(2), $request->all());
		return redirect('/');
	}

	private function recalc($orderId, $data) {
		Order::where('id', $orderId)->where('user_id', Auth::user()->id)->firstOrFail();
		if (is_array($data['item'])) {
			foreach ($data['item'] as $itemId => $quantity) {
				$quantity = intval($quantity);
				$item     = OrderItem::where('id', $itemId)->where('order_id', $orderId)->first();
				if (!$item) {
					var_export($itemId);
					var_export($quantity);
					continue;
				}
				if ($quantity <= 0) {
					$item->delete();
					continue;
				}
				$item->quantity = $quantity;
				$item->save();
			}
		}
	}
}
