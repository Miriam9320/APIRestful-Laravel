<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $cantidadUsuarios = 200;
        $cantidadCategories = 30;
        $cantidadProductos = 1000;
        $cantidadTransacciones = 1000;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Category::class, $cantidadCategories)->create();

        factory(Product::class, $cantidadProductos)->create()->each(
        	function($producto){
        		//pluck es un metodo de laravel para solo obtener el id
	        	$categories = Category::all()->random(mt_rand(1,5))->pluck('id');

	        	//attach es para relacionar de muchos a muchos
	        	$producto->categories()->attach($categories);
        	}
        );

        factory(Transaction::class, $cantidadTransacciones)->create();
    }
}
