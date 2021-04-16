<?php

namespace App\Http\Controllers;
use DB;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Inquilino;
use App\Models\Utilizador;
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
    
    public function showAllUsers()
    {
        $results = Inquilino::all();
  
        return response()->json($results);

    }

    //Updates Inqilino
    public function updateInquilino(Request $req, $username)
    {
        $data = Utilizador::find($username);
        $data->Username=$req->input('nomeUser');
        $data->PrimeiroNome=$req->input('primeiroNome');
        $data->UltimoNome=$req->input('ultimoNome');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->save();
        
        return response()->json('Updated successfully.');
    }

    //Vai buscar os dados para o perfil do Inqilino
    public function inquilinoProfile($username)
    {
        $user = Utilizador::where('username','=' ,$username)->get();

        $rentInfo = Inquilino::join('Propriedades', 'Propriedades.IdPropriedade', '=', 'Inquilino.IdPropriedade')
            ->where('Inquilino.Username', '=',$username)
            ->select('Inquilino.IdInquilino', 'Inquilino.Username', 'Inquilino.IdPropriedade', 'Propriedades.TipoPropriedade', 'Propriedades.Localizacao','Propriedades.AreaMetros')
            ->get();

        return view('profile_user',['data'=>$user],['rent'=>$rentInfo]);
    }

    public function inquilinoAluguerInfo($username){
        //$data = DB::table('Inquilino')
          //      ->join('Propriedades','IdPropriedade', '=','inquilino.IdPropriedade')
            //    ->select('Inquilino.IdInquilino', 'Inquilino.Username', 'Inquilino.IdPropriedade', 'Propriedades.TipoPropriedade', 'Propriedades.Localizacao')
              //  ->get();

        $data = Inquilino::join('Propriedades', 'Propriedades.IdPropriedade', '=', 'Inquilino.IdPropriedade')
            ->where('Inquilino.Username', '=',$username)
            ->select('Inquilino.IdInquilino', 'Inquilino.Username', 'Inquilino.IdPropriedade', 'Propriedades.TipoPropriedade', 'Propriedades.Localizacao','Propriedades.AreaMetros')
            ->get();

        return response()->json($data);
    }

    //Adiciona uma quantidade de saldo ao saldo atual do inquilino
    public function addSaldo($username, Request $amount){
        $user = Utilizador::find($username);
        $user->Saldo=$amount->input('amountToAdd')+$user->Saldo;
        $user->save();
        //$values = array('Username'=>$user->Username,'Email'=>$user->Email,'Password'=>$user->Password,
        //'PrimeiroNome'=>$user->PrimeiroNome,'UltimoNome'=>$user->UltimoNome,'Nacionalidade'=>$user->Nacionalidade,'Nascimento'=>$user->Nascimento,
        //'Morada'=>$user->Morada,'Telefone'=>$user->Telefone,'TipoConta'=>$user->TipoConta,'Saldo' => (int)($user->Saldo)+1);
        //DB::table('Utilizadores')->insert($values);
    }

    //Apresenta a pagina da wallet desse inquilino
    public function showWallet($username)
    {
        $user = Utilizador::where('username','=' ,$username)->get();

        return view('wallet',['data'=>$user]);
    }

}


?>