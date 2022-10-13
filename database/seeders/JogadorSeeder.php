<?php

namespace Database\Seeders;

use App\Models\Jogador;
use App\Models\Nacionalidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jogador::factory(10)
            ->for(Nacionalidade::factory())
            ->create();
    }
}
