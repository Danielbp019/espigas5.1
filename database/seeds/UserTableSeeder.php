<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //se usa para hacer el vaciado de la tabla y luego: php artisan db:seed
        DB::table('users')->truncate();
        //crea 1 usuario personalizado, no se crean contraseñas encriptadas si se define como personalizado
        //para crear este archivo php artisan make:seeder nombredelseed
        factory(App\User::class)->create([
                'name' => 'admin',
                'role' => 'admin',
                'password' => bcrypt('admin')
         ]);
        
        // llama al model factory, y le da la instruccion de crear 19 usuarios ramdon de pruebas.
        factory(App\User::class, 59)->create();
         
    }
}

//para ejecutar en consola: php artisan migrate --seed

//php artisan migrate::refresh --seed , esto vuelve y crea todo los datos anteriores por si hay que agregar algun usuario como el admin de datos fijos.