<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class CustomersController extends Controller
{
	public function get_api()
  	{
  		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.w3schools.com/angular/customers.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
        }

        $data = json_decode($response, true);

    	return $data;
   	}

    public function index()
    {
    	// $data = $this->get_api();
    	$data = User::all();

    	return view('admin.customers')
    	->with('users', $data);
    }

    public function insert()
    {
   		$data = $this->get_api();

   		for ($i=0; $i < count($data['records']); $i++) { 
    		$user = new User;
    		$n    = str_replace(' ','', substr($data['records'][$i]['Name'],-8));
    		$user->create([
    			'name'     => $data['records'][$i]['Name'],
    			'city'     => $data['records'][$i]['City'],
    			'country'  => $data['records'][$i]['Country'],
    			'username' => $n,//str_replace(' ', '', $data['records'][$i]['Name']),
    			'password' => Hash::make($n),
    		]);
    	}

    	return redirect()->back();
    }
}
