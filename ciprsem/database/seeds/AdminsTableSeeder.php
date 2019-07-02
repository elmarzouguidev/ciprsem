<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Role;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin_g=Role::where('name','global')->first();
        $role_user=Role::where('name','user')->first();
        $role_admin=Role::where('name','admin')->first();
        $global= new Admin();
        $global->name="Elmarzougui Abdelghafour";
        $global->email="goldvision93@gmail.com";
        $global->password=Hash::make('wx66.ofg1993');
        $global->save();
        $global->roles()->attach($role_admin_g);



        $admin= new Admin();
        $admin->name="Abdelghafour";
        $admin->email="goldvision106@hotmail.fr";
        $admin->password=Hash::make('wx66.ofg1993');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $user= new Admin();
        $user->name="Abdo";
        $user->email="devscript@gmail.com";
        $user->password=Hash::make('wx66.ofg1993');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
