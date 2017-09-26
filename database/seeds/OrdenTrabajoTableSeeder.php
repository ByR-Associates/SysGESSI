<?php

use Illuminate\Database\Seeder;
use SysGESSI\OrdenTrabajo;

class OrdenTrabajoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(OrdenTrabajo::class, 50)->create();
    }
}
