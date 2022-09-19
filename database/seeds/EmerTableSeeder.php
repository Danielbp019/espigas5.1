<?php

use Illuminate\Database\Seeder;

class EmerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emergency')->truncate();
        factory(App\Emergency::class, 60)->create();
    }
}
