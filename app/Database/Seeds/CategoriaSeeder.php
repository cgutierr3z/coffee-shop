<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            $this->db->table('categorias')->insert($this->generateCategoria());
        }
    }

    private function generateCategoria()
    {
        $faker = Factory::create();

        return [
			'nombre' => $faker->words(1, true),
		];
    }
}
