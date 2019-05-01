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
    

  
  public function resultat(Request $request)
  {
      $request->input('marque');
      $annonces = DB::table('annonces')->where([
                      ['city', '=', $request->input('ville')],
                  ])->get();

      return view('Client.resultat',['annonces' => $annonces]);
  }

/*
        public function resultat(Request $request)
    {
        $annonces = DB::table('annonces')
                ->join('voitures', 'annonces.voiture_id', '=', 'voitures.id')
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

    }*/

        
 
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
