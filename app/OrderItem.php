<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class OrderItem
	 *
	 * @package App
	 * @property int $id
	 * @property int $order_id
	 * @property Order $order
	 * @property int $product_id
	 * @property Product $product
	 * @property int $quantity
	 */
	class OrderItem extends Model {

		public $timestamps = false;

		protected $fillable = [
			'order_id',
			'product_id',
			'quantity',
		];

		public function order() {
			return $this->belongsTo('App\Order');
		}

		public function product() {
			return $this->belongsTo('App\Product');
		}

		public function getSumAttribute() {
			return $this->product->price * $this->quantity;
		}

	}
