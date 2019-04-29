<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Voiture;
use Session;
use DB;
use App\Annonce;


class PagesController extends Controller
{

    public function index()
    {
        $title = 'Bienvenue au CarDealer';
        $ann = Annonce::where('privilege','=','0');
        $annonces = $ann->get(); 

        return view('pages.index_salma')->with('title', $title)->with(compact('annonces',$annonces));;
    
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

    public function gererclient()
    {
        $title = 'Liste des Clients';
        return view('Admin.gererclient')->with('title', $title);;
    }

    public function gererpartenaire()
    {
        $title = 'Liste des Partenaires';
        return view('Admin.gererpartenaire')->with('title', $title);;
    }

    public function gererpannonce()
    {
        $title = 'Liste des Annonces';
        return view('Admin.gererpannonce')->with('title', $title);;
    }


    public function profilAdmin()
    {
        $title = 'Mon Profil';
        return view('Admin.profil')->with('title', $title);;
    }



    // Client
    public function client()
    {
        $title = '';
        return view('Client.accueil')->with('title', $title);;
    }

    public function profil()
    {
        $title = 'Mon Profil';
        return view('Client.profil')->with('title', $title);;
    }

    public function modifierprofil()
    {
        $title = 'Modifier mon profil ';
        return view('Client.modifierprofil')->with('title', $title);;
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

    public function ajoutvoiture()
    {
        $title = 'Ajouter une voiture';
        return view('Partenaire.ajoutvoiture')->with('title', $title);
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


    public function profilPartenaire()
    {
        $title = 'Mon profil';
        return view('Partenaire.profil')->with('title', $title);
    }


    public function modifierPartenaire()
    {
        $title = 'Modification de profil';
        return view('Partenaire.modifierprofil')->with('title', $title);
    }


    /*public function register()
    {
        $title = 'Sign Up';
        return view('auth.register')->with('title', $title);
    }

    public function login()
    {
        $title = 'Login';
        return view('auth.login')->with('title', $title);
    }*/
}
