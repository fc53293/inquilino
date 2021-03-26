<?php

namespace App\Http\Controllers;
use DB;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Inquilino;
use App\routes\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquilinoController extends Controller
{
 

    //Create a new Inquilino

    public function createInquilino(Request $request)
    {
        print_r($request->input());
        $order = new Inquilino;
        $order->id=$request->input('id');
        $order->email=$request->input('email');
        $order->save();
       //$inquilino = Inquilino::create($request->all());

       //return response()->json($inquilino);
    }

    //List all Inquilinos

    public function allInquilinos()
    {
        $inquilino = Inquilino::all();
        //$inquilino = $this->model->all();

        return response()->json($inquilino);
        
        //return response()->json('Mostra todas os inquilinos');
        
    }

    //Show Inquilino By ID
    public function showUserByUsername($username)
    {
        
        $users = DB::table('utilizadores')->where('username','=' ,'goncalo')->get();
        //return view('profile_user',['data'=>$users]);
        return response()->json($users);
    }
    
    //Deletes Inquilino
    public function deleteInquilino($id)
    {
        $inquilino = Inquilino::find($id);
        $inquilino->delete();

        //retrun response()->json($property);
        //return response()->json('Mostra um inquilino com esse id');
        
        return response()->json('Removed successfully.');
    }

    //Updates Inqilino
    public function updateInquilino(Request $req, $username)
    {
        $data = Inquilino::find('goncalo');
        $data->Username=$req->input('nomeUser');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->save();
        
        return response()->json('Updated successfully.');
    }

    public function showAllUsers()
    {
        $results = Inquilino::all();
  
        return response()->json($results);

    }


    public function inquilinoProfile($username)
    {
        $user = Inquilino::where('username','=' ,$username)->get();

        return view('profile_user',['data'=>$user]);
    }

    
}


?>