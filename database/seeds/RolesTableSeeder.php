<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
        	[
        		'name'  => 'Petugas 1',
		        'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
		        'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
        	],

        	[
        		'name'  => 'Petugas 2',
		        'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
		        'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
        	],

        	[
        		'name'  => 'Manager',
		        'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
		        'updated_at' => \Carbon\Carbon::now('Asia/Jakarta')
        	],
        ]);
    }
}
