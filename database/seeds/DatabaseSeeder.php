<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProvinciasTableSeeder::class);
        $this->call(CantonsTableSeeder::class);
        $this->call(ParroquiasTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(SolicitudEstudioTableSeeder::class);
        $this->call(OrdenTrabajoTableSeeder::class);
     //  $this->call(TrabajoCampoTableSeeder::class);
      //  $this->call(TrabajoLaboratorioTableSeeder::class);
	//	$this->call(TranslationsTableSeeder::class);
    }
}
