<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imazh;
use Image;
use DB;



class MakinaController extends Controller
{



    public function show(\App\Makina $makina)
    {
        if($makina->fshire==0){
            //MARRIM IMAZHET E MAKINES
            $imazhet=\App\Makina::find($makina->id)->imazhet()->get();

            $user=\App\Makina::find($makina->id)->user()->get();
            //KTHIMI I MAKINES DHE IMAZHEVE
            return view('CarDetails',['makina'=>$makina])->with(['imazhet'=>$imazhet])->with(['user'=>$user]);
        }else echo "makina nuk ekz";
    }

    public function create(Request $request)//TESTUAR
    {
        $user_id = Auth::id();
        $data=$request->all();
        $data = $request->validate(
            [
                'karburanti' => 'in:nafte,benzin,benzine,elektrike,gaz,Nafte,Benzin,Elektrike,Gaz,NAFTE,BENZINE,ELEKTRIKE,GAZ',//
                'qyteti' => 'string|max:255',
                'kambio' => 'in:manual,manuale,automat,automatike,automatik,Manual,Manuale,Automat,Automatike,Automatik,MANUAL,MANUALE,AUTOMAT,AUTOMATIKE,AUTOMATIK',
                'tipi' => 'string|max:255',
                'pershkrimi' => 'string|max:255',
                'cmimi' =>'integer|gt:0|lt:9999',
                'viti' => 'integer|gt:1920|lt:2021',

            ]
        );


        foreach($data as $key => $value){
            if($key==='karburanti'||$key==='qyteti'||$key==='kambio'||$key==='tipi')
                $data[$key]=strtolower($value);
        }
        $data['user_id']=$user_id;
        $makina=\App\Makina::create($data)->id;


        if($files=$request->file('imazhet')){
            $i=1;
            foreach($files as $imazh){
                $name = $i.time().'.'.$imazh->getClientOriginalExtension();
                $target_path=public_path('/uploads/');
                if($imazh->move($target_path, $name)) {
                    $imazh=Imazh::insert(['img_path' => $name, 'makina_id'=>$makina]);
                    $mesazh = "Postuar me sukses!";
                }else {
                    $mesazh = "Ndodhi nje gabim me procesimin e imazheve julutem provoni perseri!";
                }
                $i++;
            }
        }
        $linkdesc = "Kthehuni ke postimi makines!";
        $link = "/home/createpost";

        return view('/mesazh')->with(['mesazh'=>$mesazh])->with(['link'=>$link])->with(['linkdesc'=>$linkdesc]);
    }


    public function destroy(\App\Makina $makina)
    {
              DB::table('makinas')
                ->where('id', $makina->id)
                ->update(['fshire' => true]);
                $mesazh = 'Postimi u fshi';
                $linkdesc = "Kthehu tek profili!";
                $link = "/home";

        return view('/mesazh')->with(['mesazh'=>$mesazh])->with(['link'=>$link])->with(['linkdesc'=>$linkdesc]);
    }

    public function index()//TESTUAR
    {

        // //MARRJA E TE DHENAVE NGA FORMA DHE VALIDIME PERKATESE
        $data = request()->validate(
            [
                'qyteti' => 'string|nullable',
                'tipi' => 'string|nullable',
                'viti' => 'integer|gt:1920|lt:2021',
                'kambio' => 'string|nullable',
                'karburanti' => 'string|nullable',
            ]
        );

        $cmimi_min=request()->validate([
            'cmimi_min'=>'integer|gt:-1|lt:1000',
        ]);
        $cmimi_max=request()->validate([
            'cmimi_max'=>'integer|gte:cmimi_min|lt:1000',
        ]);

        //MARRJA E DATES SE FILLIMIT, KTHIMI NE TIPIN TIME DHE ME PAS NE FORMATIN QE DUAM
        $input_starting_date=request()->validate([
            'starting_date' => 'required|date|after:yesterday'
        ]);
        $input_starting_date=strtotime($input_starting_date['starting_date']);
        $isd=date('Y-m-d',$input_starting_date);

        //MARRJA E DATES SE MBARIMIT, KTHIMI NE TIPIN TIME DHE ME PAS NE FORMATIN QE DUAM
        $input_ending_date=request()->validate([
            'ending_date' => 'required|date|after:starting_date'
        ]);
        $input_ending_date=strtotime($input_ending_date['ending_date']);
        $ied=date('Y-m-d',$input_ending_date);

        //HEDHJA E INPUTEVE TE PERDORUESIT NE NJE ARRAY NQS ATO SJAN NULL
        $input=array();
        foreach ($data as $key => $val){
            if($val!=null){
                $key=strtolower($key);
                $input[$key]=$val;
            }
        }

        //MARRIM TE GJITHA MAKINAT NGA DATABAZA
        $select=\App\Makina::all();
        //KERKOJME TEK KONTRATAT TE GJITHA ATO MAKINA QE JANE TE ZENA NE DATAT KUR DO PERDORUESI

        $kontrataa=\App\Kontrata::where(function ($query1) use ($isd,$ied) {
            $query1->whereBetween('starting_date' , [$isd , $ied]);
        })
            ->orWhere(function ($query2) use ($isd,$ied) {
                $query2->whereBetween('ending_date' , [$isd , $ied]);
            })
            ->orWhere(function ($query3) use ($isd,$ied) {
                $query3->where('starting_date' ,'<', $isd)
                    ->where('ending_date' ,'>', $ied);
            })
            ->orWhere(function ($query4) use ($isd,$ied) {
                $query4->where('starting_date' ,'>', $isd)
                    ->where('ending_date' ,'<', $ied);
            })

            ->pluck('makina_id')
        ;

        //KERKOJME TEK MAKINAT QE TE PERMBUSHIN KUSHTIN QE KA BENE PERDORUESI CMIMI/TIPI/ etj
        if(count($kontrataa)==0){
            $results=\App\Makina::where('fshire',0)
                ->where(function($q)use($input){
                    foreach($input as $key => $val) {
                        $q->where($key, $val);
                    }
                })
                ->whereBetween('cmimi', [$cmimi_min,$cmimi_max])
                //->latest()//date newest oldest
                //->oldest()//date oldest newest
                //->orderBy('cmimi','asc')//cmimi lowest to highest
                //->orderBy('cmimi','desc')//cmimi highest to lowest
                ->paginate(4)
            ;

            //MARRIM PERSERI TE NJEJTAT MAKINA NE MENYRE QE TE GJEME IMAZHET RESPEKTIVE ME POSHTE
            $resultss=\App\Makina::where('fshire','=',0)
                ->where(function($q)use($input){
                    foreach($input as $key => $val) {
                        $q->where($key, $val);
                    }
                })
                ->whereBetween('cmimi', [$cmimi_min,$cmimi_max])
                ->pluck('id')
            ;
        }else{
            $results=\App\Makina::whereNotIn('id',$kontrataa)
                ->where('fshire',0)
                ->where(function($q)use($input){
                    foreach($input as $key => $val) {
                        $q->where($key, $val);
                    }
                })
                ->whereBetween('cmimi', [$cmimi_min,$cmimi_max])
                //->latest()//date newest oldest
                //->oldest()//date oldest newest
                //->orderBy('cmimi','asc')//cmimi lowest to highest
                //->orderBy('cmimi','desc')//cmimi highest to lowest
                ->paginate(4)
            ;

            //MARRIM PERSERI TE NJEJTAT MAKINA NE MENYRE QE TE GJEME IMAZHET RESPEKTIVE ME POSHTE
            $resultss=\App\Makina::whereNotIn('id',$kontrataa)
                ->where('fshire','=',0)
                ->where(function($q)use($input){
                    foreach($input as $key => $val) {
                        $q->where($key, $val);
                    }
                })
                ->whereBetween('cmimi', [$cmimi_min,$cmimi_max])
                ->pluck('id')
            ;
        }

        //GJEJME IMAZHIN E PARE TE SECILES MAKINE DHE E FUSIM NE NJE ARRAY QE DO JA KALOJME VIEwS
        $imazhet=array();
        foreach($resultss as $value){
            $imazh=\App\Imazh::where('makina_id','=',$value)
                ->pluck("img_path")
                ->first()
            ;
            $imazhet[$value]=$imazh;
        }

        //KTHIMI REZULTATEVE
        return view('RezultatiKerkimit')->with(['results'=>$results])->with(['isd'=>$isd])->with(['ied'=>$ied])->with(['imazhet'=>$imazhet]);


    }

    public function indexAll()
    {
        \App\Makina::all()->where('fshire','=',0)->paginate(4);
    }

    public function update(\App\Makina $makina) //TESTUAR DUHET SHTUAR IMAZHI
    {
        $kontrata=\App\Kontrata::where("makina_id", $makina->id)
            ->where("statusi", 1)
        ;

        if($kontrata){
            //makinen se fshin dot se ka kontrata
        }else{
            $user_id = Auth::id();
            $user_id_db = \App\Makina::where('id','=',$makina->id)->pluck('user_id');
            //dd($user_id,$user_id_db[0]);
            if($user_id==$user_id_db[0]){
                $data = request()->validate(
                    [
                        'karburanti' => 'string|max:255',
                        'kambio' => 'string|max:255',
                        'tipi' => 'string|max:255',
                        'cmimi' =>'int',
                        'viti' => 'int',
                        'qyteti' => 'string|max:255',
                    ]
                );
                $input=array();
                foreach ($data as $key => $val){
                    if($val!=null){
                        $input[$key]=$val;
                    }
                }
                if(!empty($input)){
                    $makina->update($input);
                    echo 'u ndryshu kontrollo db';
                    //return redirect('/home/makinat');
                }//else ploteso t pakten i fush
            }
        }
    }


}

// git add app/Http/Controllers/MakinaController.php

// //BEGIN HARDCODED DATA
// $data=[
//     'qyteti' => '',
//     'tipi' => '',
//     'viti' => '',
//     'kambio' => '',
//     'karburanti' => ''
// ];

// $cmimi_min=0;
// $cmimi_max=70000;

// $input_starting_date=strtotime('2020-11-03');
// $isd=date('Y-m-d',$input_starting_date);

// $input_ending_date=strtotime('2020-11-24');
// $ied=date('Y-m-d',$input_ending_date);
// //END HARDCODED DATA


////.old
//MARRIM TE GJITHA MAKINAT NGA DATABAZA
// // // $select=\App\Makina::all();
