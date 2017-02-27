<?php

	use Illuminate\Database\Seeder;

	class ProductsTableSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			DB::table('products')->insert([
				'name'        => 'Длинные лыжные палки',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'price'       => 3534.44,
				'created_at'  => new \DateTime()
			]);
			DB::table('products')->insert([
				'name'        => 'Острые железные лыжи',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'price'       => 32312.31,
				'created_at'  => new \DateTime()
			]);
			DB::table('products')->insert([
				'name'        => 'Плюшевый синий слон',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'price'       => 765.55,
				'created_at'  => new \DateTime()
			]);
			DB::table('products')->insert([
				'name'        => 'Королевский трон',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'price'       => 73361.45,
				'created_at'  => new \DateTime()
			]);
			DB::table('products')->insert([
				'name'        => 'Императорский жезл',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'price'       => 66423.40,
				'created_at'  => new \DateTime()
			]);
		}
	}
