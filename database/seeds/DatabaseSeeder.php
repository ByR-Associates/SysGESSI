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
       // $this->call(VoyagerDatabaseSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
       // $this->call(TranslationsTableSeeder::class);


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
