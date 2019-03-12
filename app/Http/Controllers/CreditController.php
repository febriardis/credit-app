<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Credit;

class CreditController extends Controller
{	
	public function kredit()
	{
		return new Credit;
	}

    public function index(){  
        $kredits = $this->kredit()->all();

        return view('admin.kredit', compact('kredits', $kredits));
    }

    public function insert(Request $req)
    {
        $this->validate($req, [
            'income' => 'required',
            'email'  => 'required|unique:credits'
        ]);

    	$kredits = $this->kredit()->create([
    		'user_id' => Auth::user()->id,
    		'income'  => $req->income,
            'email'   => $req->email,
            'status'  => 0,
    	]);

        return redirect()->route('credit.index');
    }


    public function approved(Request $req)
    {
        $kredits = $this->kredit()->update([
            'status'  => $req->s,
        ]);

        return redirect()->route('credit.index');
    }


    public function delete($id)
    {
        $this->kredit()->find($id)->delete();

        return redirect()->back();
    }
}
