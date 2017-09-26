<?php

use Illuminate\Database\Seeder;
use SysGESSI\TrabajoCampo;

class TrabajoCampoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(TrabajoCampo::class, 50)->create();
    }
}
