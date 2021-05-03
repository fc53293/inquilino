<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Inquilino;
use App\Models\Utilizador;
use App\Models\Pagamento;
use App\Models\HistoricoSaldo;
use App\routes\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Carbon\Carbon;

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
    public function inquilinoProfile(Request $request , $id)
    {
        //$request->session()->put('key', 'value');

        $user = Utilizador::where('IdUser','=' ,$id)->get();

        $rentInfo = Inquilino::join('Propriedades', 'Propriedades.IdPropriedade', '=', 'Inquilino.IdPropriedade')
            ->where('Inquilino.IdUser', '=',$id)
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
    public function addSaldo($id, Request $amount){
        $user = Utilizador::find($id);
        $user->Saldo=$amount->input('amountToAdd')+$user->Saldo;
        $user->save();

        $histSaldo = new HistoricoSaldo();
        $user->IdSaldo=1;
        $histSaldo->IdUser=$id;
        $histSaldo->Username=$amount->input('nameUser');
        $histSaldo->Valor=$amount->input('amountToAdd');
        $histSaldo->Data=Carbon::now();
        $histSaldo->save();
    }

    //Apresenta a pagina da wallet desse inquilino
    public function showWallet($id)
    {
        $user = Utilizador::where('IdUser','=',$id)->get();

        $userHist = HistoricoSaldo::where('IdUser','=',$id)->orderBy('IdSaldo', 'desc')->limit(4)->get();

        return view('wallet',['data'=>$user],['data2'=>$userHist]);
    }

    //Apresenta a pagina dos pagamentos
    public function showPaymentPage()
    {
        //$user = Utilizador::where('username','=' ,$username)->get();

        return view('rentPayments');
    }

    //Faz pagamentos
    public function makePayment(Request $request)
    {
        $user = new Pagamento();
        //$user->IdPagamento=1;
        $user->IdInquilino=1;
        $user->IdSenhorio=2;
        $user->Valor=$request->Valor;
        $user->Data=$request->Data;
        $user->Contribuinte=$request->Contribuinte;
        $user->save();
        // $data = array('IdPagamento' =>1,'IdInquilino' => 1, 'IdSenhorio' => 2, 'Valor' => 400, 'Data' => '2021-04-05 20:26:02', 'Contribuinte' => "222222222");
        // Pagamento::create($data);  


        return response()->json("va1");

    }
    

    //Vai para a home page
    public function goHome()
    {
        //$user = Utilizador::where('username','=' ,$username)->get();

        return view('home');
    }
}


?>