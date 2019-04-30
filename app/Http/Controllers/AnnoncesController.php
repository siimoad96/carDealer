<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


use App\Annonce;
use App\Voiture;
use Auth;
use App\User;
class AnnoncesController extends Controller
{

    /*
    public function resultat(Request $request)
    {
       $request->input('marque');
       $annonces = DB::table('annonces')->where([
                        ['city', '=', $request->input('ville')],
                        ['date', '=', $request->input('date')],
                    ])->get();

        return view('Client.resultat',['annonces' => $annonces]);

}
    public function reserverAnnonce(Request $request)
        {
            echo 'ok';
            print_r($request->input('marque'));
            //return view('Client.reserverAnnonce');

        }
*/


    public function recherche()
    {
        $annonce =Annonce::where([
            ['privilege', '=', 0],
             ]);
        $annonces = DB::table('annonces')
                ->groupBy('date')
                ->get();

        return view('Client.recherche')->with('annonces',$annonces);

    }

    
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('annonces')
        ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
        }

/*
    public function rechercheDate(Request $request)
        {
          
            $annonce =Annonce::where([
                ['privilege', '=', 0],
                ['date', '=', $request->input('date')], ]);
            $annonces = Annonce::orderBy('city','ASC')->get();

            $ville = Annonce::select('city')->groupBy('city');
            $villes=$ville->get();

            $joint = DB::table('annonces')
            ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
            ->select('annonces.*','voitures.marque','voitures.type','voitures.modele')
            ->where([
                ['privilege', '=', 0],
                ['date', '=', $request->input('date')]]);
            
                
            $modele=$joint->groupBy('modele');
            $modeles=$modele->get();

            $jointMarque = DB::table('annonces')
            ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
            ->select('annonces.*','voitures.marque','voitures.type','voitures.modele')
            ->where([
                ['privilege', '=', 0],
                ['date', '=', $request->input('date')]]);

            $marque=$jointMarque->groupBy('marque');
            $marques=$marque->get();


            $type=$jointMarque->groupBy('type');
            $types=$type->get();

            $title = 'Rechercher une annonce';
        return view('Client.rechercheDate')
                ->with('title', $title)
                ->with(compact('annonces', 'annonces'))
                ->with(compact('villes','ville'))
                ->with(compact('marques','marque'))
                ->with(compact('modeles','modele'))
                ->with(compact('types','type'));
        }
*/




        public function resultat(Request $request)
    {
        $request->input('marque');
        $annonces = DB::table('annonces')->where([
                        ['city', '=', $request->input('ville')],
                        ['date', '=', $request->input('date')],
                     ])->get();
 
         return view('Client.resultat',['annonces' => $annonces]);

        }
        /*
        $annonces = DB::table('annonces')
        
        ->orwhere('city', '=', $request->input('ville'))
        ->orWhere('voiture_id', $request->input('voiture_id'))
        ->get();

    public function resultat(Request $request)
        {
            $request->input('marque');
            $annonces = DB::table('annonces')->where([
                            ['city', '=', $request->input('ville')],
                        ])->get();
    
            return view('Client.resultat',['annonces' => $annonces]);
        }
    */
public function reserverAnnonce(Request $request)
        {
            $reservations = DB::table('annonces')
            ->join('note_voitures', 'annonces.voiture_id', '=', 'note_voitures.voiture_id')
            ->join('comment_voitures', 'annonces.voiture_id', '=', 'comment_voitures.voiture_id')
            ->where('annonces.id','=',$request->input('id'))
            ->select('annonces.*','note_voitures.note','comment_voitures.comment')
            ->get();
            return view('Client.reserverAnnonce',['reservations' => $reservations]);

        }

    
    public function ajoutannonce()
    {
        $voiture =Voiture::where('partenaire_id',Auth::id())->first();
        $voitures = Voiture::orderBy('immatricule','ASC')->get();
        $ville = User::select('city')->groupBy('city');
       $villes = $ville->get();
        $title = 'Ajouter une annonce';
        return view('Partenaire.ajoutannonce')->with('title', $title)->with(compact('voitures', 'voiture'))->with(compact('villes','ville'));
    }
    public function ajoutAnnonceSuccess()
    {
        $annonce = new Annonce();
        $annonce->title = request('title');
        $annonce->city = request('city');
        $annonce->price = request('price');
        $annonce->date = request('date');
        $annonce->from = request('from');
        $annonce->to = request('to');
        $annonce->partenaire_id =  Auth::id();
        $annonce->voiture_id =  request('vehicule');
        $annonce->privilege = request('privilege');
       

        $annonce->save();
        return "Added Successfully to database :P ";
    }
    
}
