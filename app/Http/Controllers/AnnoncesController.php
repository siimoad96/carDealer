<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;


use App\Annonce;
use App\Voiture;
use Auth;
use App\User;
class AnnoncesController extends Controller
{

    
    public function date(){

        
        $date =Annonce::where('privilege', '=', 0)
        ->groupBy('date')->get();
        return view('Client.recherche',compact('date'));

      }
   
    public function city(){
        $date = Input::get('date');
        $city = Annonce::where('date', '=', $date)
        ->groupBy('city')->get();
        return response()->json($city);
      }
  

    public function marque(){
        $city = Input::get('city');
        $marque =DB::table('annonces')
        ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
        ->where('city', '=', $city)
        ->groupBy('marque')->get();
        return response()->json($marque);
      }


         
    public function type(){
        $marque = Input::get('marque');
        $voiture_id = Input::get('voiture_id');
        $type = DB::table('annonces')
        ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
        ->where('marque', '=', $marque)
        ->groupBy('type')->get();
        return response()->json($type);
      }
       
    public function modele(){
        $marque = Input::get('type');
        $modele = DB::table('annonces')
        ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
        ->where('type', '=', $marque)
        ->groupBy('modele')->get();
        return response()->json($modele);
      }


    public function submit(){
        $city=Input::get('city');
        $submit =DB::table('annonces')
        ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
        ->where('city', '=', $city)
        ->groupBy('marque')->get();
        response()->json($submit); 
        return view('Client.resultat','submit');
      }
/*
        public function resultat(Request $request)
    {
        $annonces = DB::table('annonces')
                ->where('date', '=', $request->input('date'))
                ->orwhere([['date', '=', $request->input('date')],['city', '=', $request->input('city')]])
                ->orwhere([['date', '=', $request->input('date')],
                            ['city', '=', $request->input('city')],
                            ['marque', '=', $request->input('marque')]])
                ->orwhere([['date', '=', $request->input('date')],
                            ['city', '=', $request->input('city')],
                            ['marque', '=', $request->input('marque')],
                            ['type', '=', $request->input('type')]])
                            
                ->orwhere([['date', '=', $request->input('date')],
                            ['city', '=', $request->input('city')],
                            ['marque', '=', $request->input('marque')],
                            ['type', '=', $request->input('type')],
                            ['modele', '=', $request->input('modele')]])

                ->get();
 
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
