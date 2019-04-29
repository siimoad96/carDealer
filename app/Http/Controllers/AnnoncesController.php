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
    public function recherche()
    {
        $voitures = voiture::all();
        return view('Client.recherche',['voitures' => $voitures]);

    }


    
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

            $annonces = DB::table('annonces')
            ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
            ->where('privilege','=',0)
            ->select('annonces.*','voitures.marque','voitures.type','voitures.modele')
            ->get();
            return view('Client.recherche',['annonces' => $annonces]);

        }


        public function resultat(Request $request)
    {


        $request->input('marque');
        $annonces = DB::table('annonces')->where([
                        ['city', '=', $request->input('ville')],
                        ['date', '=', $request->input('date')],
                     ])->get();
 
         return view('Client.resultat',['annonces' => $annonces]);
        /*
        $annonces = DB::table('annonces')
        
        ->orwhere('city', '=', $request->input('ville'))
        ->orWhere('voiture_id', $request->input('voiture_id'))
        ->get();

        return view('Client.resultat',['annonces' => $annonces]);
*/
}

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
        $id = Auth::id();
        $voiture =Voiture::where('partenaire_id','=', Auth::id() );
        $voitures = $voiture->get();
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
