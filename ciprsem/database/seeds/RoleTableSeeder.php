<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_admin_g = new Role();
        $role_admin_g->name="global";
        $role_admin_g->description="the Global admin have all permission";
        $role_admin_g->save();

        $role_admin = new Role();
        $role_admin->name="admin";
        $role_admin->description="the  admin have same permission";
        $role_admin->save();

        $role_admin_s = new Role();
        $role_admin_s->name="user";
        $role_admin_s->description="the simple admin";
        $role_admin_s->save();
    }
}
