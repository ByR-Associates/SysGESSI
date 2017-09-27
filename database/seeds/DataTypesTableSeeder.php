<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'posts');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'posts',
                'display_name_singular' => 'Post',
                'display_name_plural'   => 'Posts',
                'icon'                  => 'voyager-news',
                'model_name'            => 'TCG\\Voyager\\Models\\Post',
                'policy_name'           => 'TCG\\Voyager\\Policies\\PostPolicy',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pages',
                'display_name_singular' => 'Page',
                'display_name_plural'   => 'Pages',
                'icon'                  => 'voyager-file-text',
                'model_name'            => 'TCG\\Voyager\\Models\\Page',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => 'User',
                'display_name_plural'   => 'Users',
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural'   => 'Categories',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'TCG\\Voyager\\Models\\Category',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural'   => 'Menus',
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural'   => 'Roles',
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'clientes');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'clientes',
                'display_name_singular' => 'Cliente',
                'display_name_plural'   => 'Clientes',
                'icon'                  => 'voyager-person',
                'model_name'            => 'SysGESSI\\Cliente',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'solicitud-estudios');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'solicitud_estudios',
                'display_name_singular' => 'Solicitud Estudio',
                'display_name_plural'   => 'Solicitud Estudios',
                'icon'                  => 'voyager-list-add',
                'model_name'            => 'SysGESSI\\SolicitudEstudio',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
/*
        $dataType = $this->dataType('slug', 'vehiculos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'vehiculos',
                'display_name_singular' => 'Vehiculo',
                'display_name_plural'   => 'Vehiculos',
                'icon'                  => 'voyager-truck',
                'model_name'            => 'SysGESSI\\Vehiculo',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'equipos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'equipos',
                'display_name_singular' => 'Equipo',
                'display_name_plural'   => 'Equipos',
                'icon'                  => 'voyager-settings',
                'model_name'            => 'SysGESSI\\Equipos',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }*/

    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
