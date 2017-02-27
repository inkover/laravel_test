<?php

	namespace App;

	use Illuminate\Notifications\Notifiable;
	use Illuminate\Foundation\Auth\User as Authenticatable;

	/**
	 * Class User
	 *
	 * @package App
	 * @property int $id
	 * @property string $email
	 * @property string $password
	 * @property string $phone
	 * @property string $city
	 * @property Order $orders[]
	 */
	class User extends Authenticatable {
		use Notifiable;

		public $timestamps = true;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'name',
			'email',
			'password',
			'phone',
			'city',
		];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password',
			'remember_token',
		];

		public function orders() {
			return $this->hasMany('App\Order');
		}

		public function delete() {
			$this->orders()->delete();
			return parent::delete();
		}
	}
