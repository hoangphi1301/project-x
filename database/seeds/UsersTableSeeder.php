<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$data = [
    		[
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'phone' => '0986.168.168',
        	'password' => bcrypt('123456'),
        	'position' => 'giamdoc',
        	'active' => '1',
        	'is_admin' => '1',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Hoàng Phi',
        	'email' => 'hoangphi1301@gmail.com',
        	'phone' => '0986.666.888',
        	'password' => bcrypt('123456'),
        	'position' => 'giamdoc',
        	'active' => '1',
        	'is_admin' => '1',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Guest',
        	'email' => 'guest@gmail.com',
        	'phone' => '0902.010.020',
        	'password' => bcrypt('123456'),
        	'position' => 'nhanvien',
        	'active' => '1',
        	'is_admin' => '0',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Vũ Hồng',
        	'email' => 'vuhong@gmail.com',
        	'phone' => '0982.157.159',
        	'password' => bcrypt('123456'),
        	'position' => 'truongnhom',
        	'active' => '0',
        	'is_admin' => '0',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Thu Thủy',
        	'email' => 'thuthuy@gmail.com',
        	'phone' => '0986.624.125',
        	'password' => bcrypt('123456'),
        	'position' => 'nhanvien',
        	'active' => '1',
        	'is_admin' => '0',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Quang Dũng',
        	'email' => 'quangdung@gmail.com',
        	'phone' => '0902.946.186',
        	'password' => bcrypt('123456'),
        	'position' => 'truongnhom',
        	'active' => '0',
        	'is_admin' => '0',
        	'created_at' => new Datetime(),
        ],[
        	'name' => 'Vũ Minh',
        	'email' => 'vuminh@gmail.com',
        	'phone' => '0986.986.986',
        	'password' => bcrypt('123456'),
        	'position' => 'truongnhom',
        	'active' => '1',
        	'is_admin' => '1',
        	'created_at' => new Datetime(),
        ],];

        DB::table('users')->insert($data);
    }
}
