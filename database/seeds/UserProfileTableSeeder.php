<?php

use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
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
    		'user_id' => '1',
        	'birthday' => '1996-01-01',
        	'address' => 'Hà Nội',
        	'sex' => '1',
        	'description' => '',
        	'avatar' => 'avatar_01.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '2',
        	'birthday' => '1991-01-13',
        	'address' => 'Hải Dương',
        	'sex' => '1',
        	'description' => '',
        	'avatar' => 'avatar_02.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '3',
        	'birthday' => '1996-01-01',
        	'address' => 'Hưng Yên',
        	'sex' => '1',
        	'description' => '',
        	'avatar' => 'avatar_03.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '4',
        	'birthday' => '1996-01-01',
        	'address' => 'Tp. Hồ Chí Minh',
        	'sex' => '0',
        	'description' => '',
        	'avatar' => 'avatar_04.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '5',
        	'birthday' => '1996-01-01',
        	'address' => 'Yên Bái',
        	'sex' => '0',
        	'description' => '',
        	'avatar' => 'avatar_05.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '6',
        	'birthday' => '1996-01-01',
        	'address' => 'Thanh Hóa',
        	'sex' => '1',
        	'description' => '',
        	'avatar' => 'avatar_06.jpg',
        	'created_at' => new Datetime(),
    		],[
    		'user_id' => '7',
        	'birthday' => '1996-01-01',
        	'address' => 'Đà Nẵng',
        	'sex' => '1',
        	'description' => '',
        	'avatar' => 'avatar_07.jpg',
        	'created_at' => new Datetime(),
    		],
    	];


        DB::table('user_profile')->insert($data);
    }
}
