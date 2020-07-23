<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Menu;
use App\Permission;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->info('Delete semua tabel menu');
    	Model::unguard();
    	Menu::truncate();
    	$this->menuHome();
    	$this->menuAcl();
        $this->menuActivity();
        $this->menuMaster();
    }

    private function menuHome()
    {
    	$this->command->info('Menu Home Seeder');
    	$permission = Permission::firstOrNew(array(
    		'name'=>'read-home-menu'
    	));
    	$permission->display_name = 'Read Home Menus';
    	$permission->save();
    	$menu = Menu::firstOrNew(array(
    		'name'=>'Beranda',
    		'permission_id'=>$permission->id,
    		'ordinal'=>1,
    		'parent_status'=>'N',
    		'url'=>'home',
    	));
    	$menu->icon = 'si-home';
    	$menu->save();
    }

    private function menuAcl(){
    	$this->command->info('Menu ACL Seeder');
    	$permission = Permission::firstOrNew(array(
    		'name'=>'read-acl-menu'
    	));
    	$permission->display_name = 'Read ACL Menus';
    	$permission->save();
    	$menu = Menu::firstOrNew(array(
    		'name'=>'Pengaturan ACL',
    		'permission_id'=>$permission->id,
    		'ordinal'=>1,
    		'parent_status'=>'Y'
    	));
    	$menu->icon = 'si-settings';
    	$menu->save();

          //create SUBMENU master
    	$permission = Permission::firstOrNew(array(
    		'name'=>'read-user',
    	));
    	$permission->display_name = 'Read Users';
    	$permission->save();

    	$submenu = Menu::firstOrNew(array(
    		'name'=>'Manajemen Pengguna',
    		'parent_id'=>$menu->id,
    		'permission_id'=>$permission->id,
    		'ordinal'=>2,
    		'parent_status'=>'N',
    		'url'=>'user',
    	)
    );
    	$submenu->save();

    	$permission = Permission::firstOrNew(array(
    		'name'=>'read-permission',
    	));
    	$permission->display_name = 'Read Permissions';
    	$permission->save();

    	$submenu = Menu::firstOrNew(array(
    		'name'=>'Manajemen Permissions',
    		'parent_id'=>$menu->id,
    		'permission_id'=>$permission->id,
    		'ordinal'=>2,
    		'parent_status'=>'N',
    		'url'=>'permission',
    	)
    );
    	$submenu->save();


    	$permission = Permission::firstOrNew(array(
    		'name' => 'read-role',
    	));
    	$permission->display_name = 'Read Roles';
    	$permission->save();

    	$submenu = Menu::firstOrNew(array(
    		'name' => 'Manajemen Roles',
    		'parent_id' => $menu->id,
    		'permission_id' => $permission->id,
    		'ordinal' => 2,
    		'parent_status' => 'N',
    		'url' => 'role',
    	)
    );
    	$submenu->save();
    }

    private function menuActivity()
    {
        $this->command->info('Menu Activity Seeder');
        $permission = Permission::firstOrNew(array(
            'name'=>'read-activity'
        ));
        $permission->display_name = 'Read Activity Menus';
        $permission->save();
        $menu = Menu::firstOrNew(array(
            'name'=>'Riwayat Pengguna',
            'permission_id'=>$permission->id,
            'ordinal'=>1,
            'parent_status'=>'N',
            'url'=>'activity-log',
        ));
        $menu->icon = 'si-refresh';
        $menu->save();
    }

    private function menuMaster(){
        $this->command->info('Menu Master Seeder');
        $permission = Permission::firstOrNew(array(
            'name'=>'read-master-menu'
        ));
        $permission->display_name = 'Read Master Menus';
        $permission->save();
        $menu = Menu::firstOrNew(array(
            'name'=>'Master',
            'permission_id'=>$permission->id,
            'ordinal'=>1,
            'parent_status'=>'Y'
        ));
        $menu->icon = 'si-wrench';
        $menu->save();

          //create SUBMENU master
        $permission = Permission::firstOrNew(array(
            'name'=>'read-master-umum-menu',
        ));
        $permission->display_name = 'Read Master Umum Menu';
        $permission->save();

        $submenu = Menu::firstOrNew(array(
            'name'=>'Master Data Umum',
            'parent_id'=>$menu->id,
            'permission_id'=>$permission->id,
            'ordinal'=>2,
            'parent_status'=>'Y',
        )
    );
        $submenu->save();

             //create SUBMENU master
        $permission = Permission::firstOrNew(array(
            'name'=>'read-provinsi',
        ));
        $permission->display_name = 'Read Provinsi Menu';
        $permission->save();

        $subsubmenu = Menu::firstOrNew(array(
            'name'=>'Provinsi',
            'parent_id'=>$submenu->id,
            'permission_id'=>$permission->id,
            'ordinal'=>3,
            'parent_status'=>'N',
            'url'=>'provinsi',
        )
    );
        $subsubmenu->save();

    }
}
