<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // system admin entry data
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'system@admin.com';
        $admin->password = bcrypt('123456');
        $admin->mobile= '01799872659';
        $admin->profile_image = 'admin.jpg';
        $admin->user_role = '0';
        $admin->status = '1';
        $admin->save();

        // demo teacher entry data
        $admin = new User;
        $admin->name = 'Md. Abu Sayed';
        $admin->email = 'abu.sayed@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->mobile= '01799872659';
        $admin->profile_image = 'teacher.jpg';
        $admin->user_role = '1';
        $admin->status = '1';
        $admin->save();

        // demo student entry data
        $admin = new User;
        $admin->name = 'Rabbee';
        $admin->email = 'rabbee@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->mobile= '01799872659';
        $admin->profile_image = 'rabbee.jpg';
        $admin->user_role = '2';
        $admin->status = '1';
        $admin->save();
    }
}
