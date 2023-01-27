<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        //$fabricator = new Fabricator(ProductosModel::class);
        //$fabricator->create(10);

        for($i = 0; $i < 10; $i++){
            $this->db->table('productos')->insert($this->generateProducto());
        }
    }

    private function generateProducto()
    {
        $faker = Factory::create();

        return [
			'nombre' 		=> $faker->words(3, true),
			'referencia' 	=> $faker->bothify('?????-#####'),
			'precio'		=> $faker->numberBetween(10000, 1000000),
			'peso' 			=> $faker->numberBetween(10, 1000),
			//'categoria' 	=> $faker->words(2, true),
			'stock' 		=> $faker->numberBetween(1, 1000)
		];
    }
}
