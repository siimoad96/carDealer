<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Voiture;
use Session;


class PagesController extends Controller
{
    public function index()
    {
        $title = 'Bienvenu au CarDealer';
        return view('pages.index_salma')->with('title', $title);
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);;
    }

    public function services()
    {
        $data = array(
            'title' => 'Notre Équipe',
            'services' => ['AIT YAICH YAHIA', 'AKRAFLI SAFAE ' , 'AROUGA SALMA', 'KHIDER MOAD', 'RAHMOUNI MERIEM']

        );
        return view('pages.services')->with($data);;
    }



    // Admin

    public function accueil()
    {
        $title = 'Espace Admin';
        return view('Admin.accueil')->with('title', $title);;
    }


    public function gererpannonce()
    {
        $title = 'Liste des Annonces';
        return view('Admin.gererpannonce')->with('title', $title);;
    }

    public function accueilClient()
    {
        $annonces = Annonce::all();
        $annonce = $annonces->get();
        return view('Client.accueil')->with(compact('annonce', $annonces));
    }

    public function recherche()
    {
        $title = 'Recherche';
        return view('Client.recherche')->with('title', $title);;
    }

    public function resultat()
    {
        $title = 'Resultats de mes recherches  ';
        return view('Client.resultat')->with('title', $title);;
    }


    //partenaire

    public function part()
    {
        $title = '';
        return view('Partenaire.accueil')->with('title', $title);;
    }

    public function ajoutannonce()
    {
        $voiture =Voiture::where('partenaire_id',Auth::id());
        $voitures = Array('voiture'=>$voiture);
        $title = 'Ajouter une annonce';
        return view('Partenaire.ajoutannonce')->with('title', $title)->with('voitures', $voitures);
    }

    public function listereservations()
    {
        $title = 'Liste des réservations ';
        return view('Partenaire.listereservations')->with('title', $title);
    }



}
