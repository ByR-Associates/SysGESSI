<?php

use Illuminate\Database\Seeder;
use SysGESSI\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class, 50)->create();
    }
}
