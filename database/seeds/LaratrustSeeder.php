<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \App\Role::create([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \App\Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            $this->command->info("Creating '{$key}' user");

            // Create default user for each role
            // $user = \App\User::create([
            //     'name' => ucwords(str_replace('_', ' ', $key)),
            //     'username'=>$key,
            //     'email' => $key.'@app.com',
            //     'password' => bcrypt('password')
            // ]);

            // $user->attachRole($role);


            $check_id_profile=\App\User::where('name','like','%'.ucwords(str_replace('_', ' ', $key)).'%')->first();
            if(isset($check_id_profile) && !empty($check_id_profile))
            {
                if($check_id_profile->id_profile!==null)
                {
                    $profile_id=$check_id_profile->id_profile;
                }
                else
                {
                    $checkProfile=\App\Models\Pegawai::find($check_id_profile->id_profile);

                    if(isset($checkProfile) && !empty($checkProfile))
                    {
                    //     $data=array(
                    //         'nama_lengkap'=>ucwords(str_replace('_', ' ', $key)),
                    // // 'nip'=>getNoNIP1(),
                    //     );

                    //     $checkPegawai->update($data);

                        $profile_id=$checkProfile->id;
                    }
                    else
                    {
                        $profile = \App\Models\Profile::firstOrNew([
                            'nama_depan'=>ucwords(str_replace('_', ' ', $key)),
                        ]);

                        $profile->save();

                        $profile_id=$profile->id;
                    }
                }
            }
            else
            {
                $checkProfile=\App\Models\Profile::where('nama_depan','like','%'.ucwords(str_replace('_', ' ', $key)).'%')->first();

                if(isset($checkProfile) && !empty($checkProfile))
                {
                    $data=array(
                        'nama_depan'=>ucwords(str_replace('_', ' ', $key)),
                    // 'nip'=>getNoNIP1(),
                    );

                    $checkProfile->update($data);

                    $profile_id=$checkProfile->id;
                }
                else
                {
                    $profile = \App\Models\Profile::firstOrNew([
                        'nama_depan'=>ucwords(str_replace('_', ' ', $key)),
                    ]);

                    $profile->save();

                    $profile_id=$profile->id;
                }
            }


            $user = \App\User::firstOrNew([
                'username' => $key,
            ]);

            $user->name = ucwords(str_replace('_', ' ', $key));
            $user->email = $key.'@nubeskop.id';
            $user->password = bcrypt('password');
            $user->status_aktif=true;
            $user->id_profile=$profile_id;
            $user->save();
            // $user->attachRole($role);
            App\Models\RoleUser::firstOrNew([
              'user_id'=>$user->id,
              'role_id'=>$role->id,
              'user_type'=>'App\User',
            ])->save();
        
        }

        // Creating user with permissions
        if (!empty($userPermission)) {

            foreach ($userPermission as $key => $modules) {

                foreach ($modules as $module => $value) {

                    // Create default user for each permission set
                    $user = \App\User::create([
                        'name' => ucwords(str_replace('_', ' ', $key)),
                        'username'=>$key,
                        'email' => $key.'@app.com',
                        'password' => bcrypt('password'),
                        'remember_token' => str_random(10),
                    ]);
                    $permissions = [];

                    foreach (explode(',', $value) as $p => $perm) {

                        $permissionValue = $mapPermission->get($perm);

                        $permissions[] = \App\Permission::firstOrCreate([
                            'name' => $permissionValue . '-' . $module,
                            'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                            'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        ])->id;

                        $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                    }
                }

                // Attach all permissions to the user
                $user->permissions()->sync($permissions);
            }
        }
        $developervalue = \App\User::firstOrNew([
            'username' => 'developer',
        ]);
        $developervalue->password = bcrypt('maintenis');
        $developervalue->save();
            
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        \App\Models\Profile::truncate();
        \App\User::truncate();
        \App\Role::truncate();
        \App\Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
