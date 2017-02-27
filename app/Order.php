<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class Order
	 *
	 * @package App
	 * @property int $id
	 * @property int $user_id
	 * @property User $user
	 * @property OrderItem $items[]
	 */
	class Order extends Model {

		public $timestamps = true;

		protected $fillable = [
			'user_id',
		];

		public function user() {
			return $this->belongsTo('App\User');
		}

		public function items() {
			return $this->hasMany('App\OrderItem');
		}

		public function getTotalSumAttribute() {
			$result = 0;
			foreach ($this->items as $item) {
				$result += $item->sum;
			}
			return $result;
		}

		public function getTotalQuantityAttribute() {
			$result = 0;
			foreach ($this->items as $item) {
				$result += $item->quantity;
			}
			return $result;
		}



		public function delete() {
			$this->items()->delete();
			return parent::delete();
		}
	}
