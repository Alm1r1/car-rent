<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Makina;
use App\Kontrata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class KontrataController extends Controller
{
    //bismillah


    public function index(){
        $adminController=Auth::user()->is_admin;

        if($adminController===1){
            // $kontrata=Kontrata::all();
            $kontrata = DB::table('users')
                ->join('kontratas', 'users.id', '=', 'kontratas.user_id')
                ->join('makinas', 'kontratas.makina_id', '=', 'makinas.id')
                ->select('kontratas.id','kontratas.starting_date','kontratas.ending_date', 'users.name', 'makinas.tipi')
                ->paginate(10);


        }
        else{

            // $kontrata=User::find(Auth::id())->kontratat->where('user_id',Auth::id());
            $kontrata = DB::table('users')
                ->join('kontratas', 'users.id', '=', 'kontratas.user_id')
                ->join('makinas', 'kontratas.makina_id', '=', 'makinas.id')
                ->select('kontratas.id','kontratas.starting_date','kontratas.ending_date', 'users.name', 'makinas.tipi')
                ->where('kontratas.user_id','=',Auth::id())
                ->paginate(10);

        }

        return view("Kontrata",['kontratas'=>$kontrata]);
        // return $kontrata;
    }


    public function oneContrat($id){
        $adminController=Auth::user()->is_admin;

        if($adminController===1){
            $kontrata=Kontrata::findorfail($id);
            return view("SingleContrat",['kontrata'=>$kontrata]);

        }
        else{
            $kontrata=Kontrata::findorfail($id);
            if(Auth::id()==$kontrata->user_id){
                return view("SingleContrat",['kontrata'=>$kontrata]);

            }
        }



    }


    public function deleteContrat($id){
        $adminController=Auth::user()->is_admin;
        if($adminController===1){
            $kontrata=Kontrata::findorfail($id);

            $kontrata->delete();
            return redirect('/user/kontratat');


        }
        else{
            $kontrata=Kontrata::findorfail($id);
            if(Auth::id()==$kontrata->user_id){
                $kontrata->delete();
                return redirect('/user/kontratat');
            }
        }




    }



    public function CreateContrat($id){
        $todayDate = date("Y-m-d");
        $newKon=new Kontrata();
        $newKon->created_at=now();
        $newKon->updated_at=now();
        $makina=Makina::findorfail($id);
        $datavalidate=request()->validate([
            'data'=>'required|after:'.$todayDate,
            'data2'=>'required|after:'.$todayDate,

        ]);

        $dataf=$newKon->starting_date=request('data');
        $dataff=strtotime($dataf);



        $datam=$newKon->ending_date=request('data2');
        $datamm=strtotime($datam);
        $datediff = $datamm - $dataff;
        $numberDay=$datediff / (60 * 60 * 24);
        $carPrice=$makina->cmimi;
        $totali=$carPrice*$numberDay;



        if($dataff>$datamm){
            $mesazh = "Rezervimi deshtoi! Data e mbarimit duhet te jete me e madhe se data e fillimit!";
            $linkdesc = "Kthehuni tek rezervimi per te ndryshuar daten!";
            $link = "/searchCar/".$id;

            return view('/mesazh')->with(['mesazh' => $mesazh])->with(['link' => $link])->with(['linkdesc' => $linkdesc]);
        }
        else {
            $newKon->total = $totali;
            $newKon->is_closed = 0;
            $newKon->user_id = Auth::id();
            $newKon->makina_id = $id;


            $kontrata = Kontrata::where(["makina_id" => $id])
                ->whereBetween('starting_date', array(date('Y-m-d', $dataff), date('Y-m-d', $datamm)))
                ->orWhere(function ($q) use ($dataff, $datamm, $id) {
                    $q->whereBetween('ending_date', array(date('Y-m-d', $dataff), date('Y-m-d', $datamm)))
                        ->where(["makina_id" => $id]);
                })
                ->get();
            //dd($kontrata);

            if ($kontrata->count() == 0) {
                $newKon->save();
                return redirect('/user/kontrata/' . $newKon->id);
            } else {
                $mesazh = "Makina eshte e zene ne kete date!";
                $linkdesc = "Kthehuni tek rezervimi per te ndryshuar daten!";
                $link = "/searchCar/".$id;

                return view('/mesazh')->with(['mesazh' => $mesazh])->with(['link' => $link])->with(['linkdesc' => $linkdesc]);
            }
        }
    }


    public function search(){
        $user=request('user');
        $makina=request('makina');
        $data=request('datekerkimi');

        $Data=strtotime($data);
        $kontrataQuery = DB::table('kontratas')
            ->join('users', 'kontratas.user_id', '=', 'users.id')
            ->join('makinas', 'makina_id', '=', 'makinas.id')
            ->select('kontratas.id','kontratas.starting_date','kontratas.ending_date', 'users.name', 'makinas.tipi');

        if(!empty($data)){


            $kontrataQuery->where('starting_date', '<',  date('Y-m-d',$Data));
        }
        else if(!empty($user)){
            $kontrataQuery->where('users.name', 'LIKE', "%{$user}%");
        }
        else if(!empty($makina)){
            $kontrataQuery->where('makinas.tipi', 'LIKE', "%{$makina}%");

        }



        $kontrata = $kontrataQuery->paginate(10);
        return view("Kontrata",['kontratas'=>$kontrata]);;

    }


    public function clientContrat($id){
        $kontrataQuery = DB::table('kontratas as k')
            ->join('makinas as m', 'k.makina_id', '=', 'm.id')
            ->join('users as i', 'm.user_id', '=', 'i.id')
            ->join('users as u', 'k.user_id', '=', 'u.id')
            ->select('i.name as qiradhenesi','k.id as kontrataId','k.starting_date','k.ending_date','k.is_closed as status','k.user_id' , 'm.tipi','u.name as qiramarresi','m.id')
            ->where('m.user_id','=',$id);
        $kontrata=$kontrataQuery->paginate(10);
        return view("KontrataSiKlient",['kontratas'=>$kontrata]);

    }

    public function clientsearch(){

        $qiradhenesi=request('qm');//esht qiradhenesi
        $qiramarresi=request('qr');//eshte qirammaresi

        $kontrataQuery = DB::table('kontratas as k')
            ->join('makinas as m', 'k.makina_id', '=', 'm.id')
            ->join('users as i', 'm.user_id', '=', 'i.id')
            ->join('users as u', 'k.user_id', '=', 'u.id')
            ->select('i.name as qiradhenesi','k.user_id','k.id as kontrataId','k.starting_date','k.ending_date','k.is_closed as status',  'm.tipi','u.name as qiramarresi','m.id')
            ->where('m.user_id','=',Auth::id()) ;

        if(!empty($qiramarresi)){
            $kontrataQuery->where('u.name', 'LIKE', "%{$qiramarresi}%");
        }
        else if (!empty($qiradhenesi)){
            $kontrataQuery->where('i.name', 'LIKE', "%{$qiradhenesi}%");

        }



        $kontrata = $kontrataQuery->paginate(10);

        return view("KontrataSiKlient",['kontratas'=>$kontrata]);;

    }




}
