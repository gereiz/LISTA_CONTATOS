<?php

use Illuminate\Database\Seeder;
use \App\Contato;
use \Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->truncate();

        $faker = Faker::create("pt_BR");

        foreach (range(1, 200) as $i) {

            $data = [
                'nome' => $faker->firstName,
                'telefone' => $faker->unique()->phoneNumber,
                'email' => $faker->unique()->email,

            ];

            $data = array_merge($data, $this->getEndereco(rand (0, 9)));

            Contato::create($data);
        }
    }

    /**
     * @param int $posicao
     * @return array
     */

    }
}
