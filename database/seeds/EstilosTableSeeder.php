<?php

use Illuminate\Database\Seeder;

class EstilosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estilos')->insert([
            'fondoheader' => '#084B8A',
            'textoheader' => '#ffffff',
            'fondofooter' => '#084B8A',
            'textofooter' => '#ffffff',
            'fondonavbar' => '#004884',
            'textonavbar' => '#ffffff',
            'activo' => '1',
            'borrado' => '0',
            'facultad_id' => '1'
        ]);
    }
}
