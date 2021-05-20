<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Inquilino;
use App\Models\Utilizador;
use App\Models\Pagamento;
use App\Models\Likes;
use App\Models\Rating;
use App\Models\Propriedade;
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
        
        $users = DB::table('Utilizadores')->where('Username','=' ,'goncalo')->get();
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
    public function updateInquilino(Request $req, $id)
    {
        $ola = $req->input('morada');

        $data = Utilizador::find($id);
        $data->Username=$req->input('nomeUser');
        $data->PrimeiroNome=$req->input('primeiroNome');
        $data->UltimoNome=$req->input('ultimoNome');
        $data->Email=$req->input('mail');
        $data->Morada=$req->input('morada');
        $data->Nascimento=$req->input('dateNascimento');
        $data->save();
        
        return response()->json([$ola,"morada"]);
    }

    //Vai buscar os dados para o perfil do Inqilino
    public function inquilinoProfile(Request $request , $id)
    {
        //$request->session()->put('key', 'value');

        $user = Utilizador::where('IdUser',$id)->get();

        $rentInfo = Inquilino::join('Propriedades', 'Propriedades.IdPropriedade', '=', 'Inquilino.IdPropriedade')
            ->where('Inquilino.IdUser', '=',$id)
            ->select('Inquilino.IdInquilino', 'Inquilino.Username', 'Inquilino.IdPropriedade', 'Propriedades.TipoPropriedade', 'Propriedades.Localizacao','Propriedades.AreaMetros','Propriedades.Latitude','Propriedades.Longitude')
            ->get();

        $rentDateInfo = Inquilino::where('IdUser',$id)->value('FimContrato');
        
        $result = Carbon::createFromFormat('Y-m-d H:i:s', $rentDateInfo)->isPast();
        //dd($result);
        
        return view('profile_user',['data'=>$user,'rent'=>$rentInfo,'rentCheck'=>$result]);
    }

    public function renovarAluguer(Request $req, $id)
    {
        $opcaoMeses = $req->input('renovarMeses1');
        $userLoged = 1;
 
        $rent = Inquilino::where('IdUser', $id)
        // $rent->FimContrato=Carbon::now()->addMonths(6);
        // $rent->save();
       ->update([
           'FimContrato' => Carbon::now()->addMonthsNoOverflow(6)
        ]);
        $rentDateInfo = Inquilino::where('IdUser',$id)->value('FimContrato');
        $result = Carbon::createFromFormat('Y-m-d H:i:s', $rentDateInfo)->isPast();
        return response()->json(['rentCheck'=>$result]);
        

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

        return response()->json(['res'=>$user->Saldo]);

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
        //$user = Utilizador::where('Username','=' ,$username)->get();

        return view('home');
    }

    //Guardar a imagem de perfil
    public function storeProfileImg(Request $req)
    {
        //Methods we can use on Request
        //guessExtension()
        //getMimeType()
        //store()
        //asStore()
        //storePublicly()
        //move
        //getClientOriginalName()
        //getClientMimeType()
        //guessClientExtension()

        //dd($req->all());
        $this->validate($req,[
            'imgProfile' => 'required|mimes:jpg,png,jpeg,|max:5048'
        ]);
        $file = $req->imgProfile->getClientOriginalName();
        $fileName = pathinfo($file,PATHINFO_FILENAME);

        $newImgName = time() . '-' . $fileName . '.' . 
        $req->imgProfile->extension();

        $req->imgProfile->move('img',$newImgName);

        $user = Utilizador::find(1);
        $user->imagem=$newImgName;
        $user->save();
    }

    public function propertyInfo($id)
    {
        $property = Propriedade::where('IdPropriedade', $id)->get();
        $ratingGiven = Rating::where('IdPropriedade', $id)->where('IdUser',1)->get();
        $avgStar = Rating::where('IdPropriedade', $id)->avg('Rating');


        //return response()->json($avgStar);
        return view('propInfo',compact('property','ratingGiven','avgStar'));
    }

    public function findPropriedade(Request $request)
    {
        $dataLike = Likes::where('IdUser','=' ,1)->get();
        //$search_data2 = $_GET['query'];
        $search_data1 = $request->input('tipoProp');
        $search_data2 = $request->input('query2');
        $search_data3 = $request->input('areaMetros');
        $search_data4 = $request->input('lprice');
        $search_data5 = $request->input('nquartos');
        $search_data6 = $request->input('oriSolar1');
        //$search_data7 = $request->input('oriSolar2');

        $proprerties = Propriedade::where('Localizacao', 'LIKE', '%'.$search_data2.'%');
        if (!$search_data1 && !$search_data2 && !$search_data3 && !$search_data4){
            $proprerties = Propriedade::where('Localizacao', 'LIKE', '%'.$search_data2.'%');
        }
        //dd($search_data4);
        if ($search_data1){
            $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%');

        }

        if ($search_data2){
            $proprerties = $proprerties->where('Localizacao', 'LIKE', '%'.$search_data2.'%');

        }

        if ($search_data4){
            $proprerties = $proprerties->where('Preco', '<',(int)$search_data4);

        }

        if ($search_data5){
            $proprerties = $proprerties->where('NumeroQuartos',(int)$search_data5);

        }

        if ($search_data6){
            //dd($search_data6);
            $proprerties = $proprerties->where('OrientacaoSolar',$search_data6);

        }


        // else if ($search_data3 == ""){
        //     $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
        //     ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
        //     //->where('AreaMetros', '<',(int)$search_data3)
        //     //->where('Preco', '<',(int)$search_data4)
        //     ->paginate(1);
        // }
        // else{
        //     $proprerties = Propriedade::where('TipoPropriedade', 'LIKE', '%'.$search_data1.'%')
        //     ->where('Localizacao', 'LIKE', '%'.$search_data2.'%')
        //     ->where('AreaMetros', '<',(int)$search_data3)
        //     ->where('Preco', '<',(int)$search_data4)
        //     ->get();
        // }
        //$proprerties->appends($request->all());
        $proprerties = $proprerties->where('Disponibilidade','disponivel')->paginate(1)->appends(request()->query());
        //return response()->json($dataLike);
        return view('find_propriedade',compact('proprerties','dataLike'));
    }
}


?>