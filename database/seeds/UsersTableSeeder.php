<?php

	use Illuminate\Database\Seeder;

	class UsersTableSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			DB::table('users')->insert([
				'name' => 'Пупкин Василий Иванович',
				'phone' => '+71234567890',
				'city' => 'Васюки',
				'email' => 'test@test.ru',
				'password' => bcrypt('123123')
			]);
			DB::table('users')->insert([
				'name' => 'Юркин Никита Анатольевич',
				'phone' => '+71234567890',
				'city' => 'Барнаул',
				'email' => 'inkover@ya.ru',
				'password' => bcrypt('123123')
			]);

		}
	}
