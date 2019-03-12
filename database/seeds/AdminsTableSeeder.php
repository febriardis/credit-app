<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Role;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_petugas1 = Role::where('name', 'Petugas 1')->first();
        $role_petugas2 = Role::where('name', 'Petugas 2')->first();
	    $role_manager  = Role::where('name', 'Manager')->first();

	    $petugas1           = new Admin();
	    $petugas1->name     = 'Harits Rahman';
	    $petugas1->username = 'harits';
	    $petugas1->password = Hash::make('harits1234');
	    $petugas1->save();
	    $petugas1->roles()->attach($role_petugas1);

	   	$petugas2           = new Admin();
	    $petugas2->name     = 'Rizal Zaenal';
	    $petugas2->username = 'rizal';
	    $petugas2->password = Hash::make('rizal1234');
	    $petugas2->save();
	    $petugas2->roles()->attach($role_petugas2);

	    $manager 			= new Admin();
	    $manager->name 		= 'Febri Ardi Saputra';
	    $manager->username 	= 'febri';
	    $manager->password 	= Hash::make('febri1234');
	    $manager->save();
	    $manager->roles()->attach($role_manager);
    }
}
