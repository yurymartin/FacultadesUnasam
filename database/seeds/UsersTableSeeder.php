<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultades')->insert([
            'nombre' => 'FACULTADES DE CIENCIAS SOCIALES, EDUCACIÓN Y DE LA COMUNICACIÓN',
            'abreviatura' => 'FCSEC',
            'telefono' => '00-0000',
            'direccion' => 'huaraz-shancayan',
            'email' => 'fcsec@gmail.com',
            'activo' => '1',
            'borrado' => '0',
        ]);

        //Registrando las personas
        DB::table('personas')->insert([
            'dni' => '00000000',
            'nombres' => 'super-admin',
            'apellidos' => '',
            'foto' => 'masculino.png',
            'genero' => 'masculino',
        ]);
        DB::table('personas')->insert([
            'dni' => '11111111',
            'nombres' => 'admin',
            'apellidos' => '',
            'foto' => 'masculino.png',
            'genero' => 'masculino',
        ]);

        // usuario con el rol de editor
        $editor = User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('super-admin'),
            'activo' => '1',
            'borrado' => '0',
            'persona_id' => '1',
            'facultad_id' => '1'
        ]);
        $editor->assignRole('super-admin');

        // usuario con el rol de moderador
        $editor = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'activo' => '1',
            'borrado' => '0',
            'persona_id' => '2',
            'facultad_id' => '1'
        ]);
        $editor->assignRole('admin');
    }
}
