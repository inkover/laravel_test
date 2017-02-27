<?php

	namespace App\Http\Controllers\Auth;

	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Validator;

	class ProfileController extends Controller {

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->middleware('auth');
		}

		/**
		 * Show the application profile form.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function showProfileForm() {
			$user = Auth::user();
			return view('auth.profile', [
				'user' => $user
			]);
		}

		/**
		 * Handle a profile update request for the application.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function updateProfile(Request $request) {
			$this->validator($request->all())->validate();

			$this->save($request->all());

			return redirect('/profile');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param  array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data) {
			return Validator::make($data, [
				'name'         => 'required|max:120',
				'email'        => 'required|email|max:120|unique:users,id',
				'phone'        => 'required|max:120',
				'city'         => 'required|max:120',
				'new_password' => 'confirmed|max:6',
			]);
		}

		/**
		 * Create a new user instance after a valid registration.
		 *
		 * @param  array $data
		 * @return User
		 */
		protected function save(array $data) {
			$user       = Auth::user();
			$updateData = [
				'name'  => $data['name'],
				'email' => $data['email'],
				'phone' => $data['phone'],
				'city'  => $data['city'],
			];
			if ($data['new_password']) {
				$updateData['password'] = bcrypt($data['new_password']);
			}
			return $user->update($updateData);
		}
	}
