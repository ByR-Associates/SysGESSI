<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
   public function run()
    {
        if (file_exists(base_path('routes/web.php'))) {
            require base_path('routes/web.php');

            $menu = Menu::where('name', 'admin')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Dashboard',
                'url'        => '',
                'route'      => 'voyager.dashboard',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-dashboard',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 1,
                ])->save();
            }


          $estudiosmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Estudios',
                'url'        => '',
                
            ]);
            if (!$estudiosmenuItem->exists) {
                $estudiosmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-lightbulb',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }
           

            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Clientes',
                'url'        => 'admin/clientes',
                'route'      => 'voyager.clientes.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-person',
                    'color'      => null,
                    'parent_id'  => $estudiosmenuItem->id,
                    'order'      => 3,
                ])->save();
            }



            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Solicitud',
                'url'        => 'admin/solicitud-estudios',
                'route'      => 'voyager.solicitud-estudios.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-list-add',
                    'color'      => null,
                    'parent_id'  => $estudiosmenuItem->id,
                    'order'      => 4,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Orden De Trabajo',
                'url'        => '',
                'route'      => 'voyager.ordendetrabajo.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-documentation',
                    'color'      => null,
                    'parent_id'  => $estudiosmenuItem->id,
                    'order'      => 5,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Trabajos De Campo',
                'url'        => '',
                'route'      => 'voyager.trabajosdecampo.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-hammer',
                    'color'      => null,
                    'parent_id'  => $estudiosmenuItem->id,
                    'order'      => 6,
                ])->save();
            }



            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Trabajos De Laboratorio',
                'url'        => '',
                'route'      => 'voyager.trabajosdelaboratorio.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-lab',
                    'color'      => null,
                    'parent_id'  => $estudiosmenuItem->id,
                    'order'      => 7,
                ])->save();
            }
            


             $bitacorasmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Bitacoras',
                'url'        => '',
                
            ]);
            if (!$bitacorasmenuItem->exists) {
                $bitacorasmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-book',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 8,
                ])->save();
            }
           

           $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Bitácoras de campo',
                'url'        => '',
                'route'      => 'voyager.bitacorasdecampo.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-receipt',
                    'color'      => null,
                    'parent_id'  => $bitacorasmenuItem->id,
                    'order'      => 9,
                ])->save();
            }
            

            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Bitácoras de Laboratorio',
                'url'        => '',
                'route'      => 'voyager.bitacorasdelaboratorio.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-logbook',
                    'color'      => null,
                    'parent_id'  => $bitacorasmenuItem->id,
                    'order'      => 10,
                ])->save();
            }


            $contabilidadmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Contabilidad',
                'url'        => '',
                
            ]);
            if (!$contabilidadmenuItem->exists) {
                $contabilidadmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-bar-chart',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 11,
                ])->save();
            }



             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Cuentas Por Cobrar',
                'url'        => '',
                'route'      => 'voyager.cuentasporcobrar.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-dollar',
                    'color'      => null,
                    'parent_id'  => $contabilidadmenuItem->id,
                    'order'      => 12,
                ])->save();
            }



             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Facturas',
                'url'        => '',
                'route'      => 'voyager.facturas.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-file-text',
                    'color'      => null,
                    'parent_id'  => $contabilidadmenuItem->id,
                    'order'      => 13,
                ])->save();
            }

            


             $inventariomenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Inventario',
                'url'        => '',
            ]);
            if (!$inventariomenuItem->exists) {
                $inventariomenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-edit',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 14,
                ])->save();
            }



             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Equipos',
                'url'        => '',
                'route'      => 'voyager.equipos.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-settings',
                    'color'      => null,
                    'parent_id'  => $inventariomenuItem->id,
                    'order'      => 15,
                ])->save();
            }



             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Vehículos',
                'url'        => '',
                'route'      => 'voyager.vehiculos.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-truck',
                    'color'      => null,
                    'parent_id'  => $inventariomenuItem->id,
                    'order'      => 16,
                ])->save();
            }



            $informesmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Informes',
                'url'        => '',
              
            ]);
            if (!$informesmenuItem->exists) {
                $informesmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-documentation',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 17,
                ])->save();
            }


               $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Informes De Estudio',
                'url'        => '',
                'route'      => 'voyager.informesdeestudio.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-news',
                    'color'      => null,
                    'parent_id'  => $informesmenuItem->id,
                    'order'      => 18,
                ])->save();
            }


             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Informes Financieros',
                'url'        => '',
                'route'      => 'voyager.informesfinancieros.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-pie-chart',
                    'color'      => null,
                    'parent_id'  => $informesmenuItem->id,
                    'order'      => 19,
                ])->save();
            }


             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Informes Administrativos',
                'url'        => '',
                'route'      => 'voyager.informesadministrativos.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-logbook',
                    'color'      => null,
                    'parent_id'  => $informesmenuItem->id,
                    'order'      => 20,
                ])->save();
            }


            $administracionmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Administracion',
                'url'        => '',
               
            ]);
            if (!$administracionmenuItem->exists) {
                $administracionmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-person',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 21,
                ])->save();
            }


             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Usuarios',
                'url'        => '',
                'route'      => 'voyager.users.index',
               
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-people',
                    'color'      => null,
                    'parent_id'  => $administracionmenuItem->id,
                    'order'      => 22,
                ])->save();
            }


             $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Roles',
                'url'        => '',
                'route'      => 'voyager.roles.index',
               
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-lock',
                    'color'      => null,
                    'parent_id'  => $administracionmenuItem->id,
                    'order'      => 23,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Menu',
                'url'        => '',
                'route'      => 'voyager.menus.index',
               
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-list',
                    'color'      => null,
                    'parent_id'  => $administracionmenuItem->id,
                    'order'      => 24,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Multimedia',
                'url'        => '',
                'route'      => 'voyager.media.index',
               
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-images',
                    'color'      => null,
                    'parent_id'  => $administracionmenuItem->id,
                    'order'      => 25,
                ])->save();
            }


             $herramientasmenuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Herramientas',
                'url'        => '',
               
            ]);
            if (!$herramientasmenuItem->exists) {
                $herramientasmenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-tools',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 26,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Database Builder',
                'url'        => '',
                'route'      => 'voyager.database.index',
               
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-data',
                    'color'      => null,
                    'parent_id'  => $herramientasmenuItem->id,
                    'order'      => 27,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Compass',
                'url'        => route('voyager.compass.index', [], false),
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-compass',
                    'color'      => null,
                    'parent_id'  => $herramientasmenuItem->id,
                    'order'      => 28,
                ])->save();
            }
            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Hooks',
                'url'        => route('voyager.hooks', [], false),
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-hook',
                    'color'      => null,
                    'parent_id'  => $herramientasmenuItem->id,
                    'order'      => 29,
                ])->save();
            }
            $menuItem = MenuItem::firstOrNew([
                'menu_id'    => $menu->id,
                'title'      => 'Configuración',
                'url'        => '',
                'route'      => 'voyager.settings.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-settings',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 30,
                ])->save();
            }



        }
    }
}
