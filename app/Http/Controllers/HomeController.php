<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

use App\Annonce;
use App\Voiture;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->privilege == 0) {
            $annonces = DB::table('annonces')->get();
        
            return view("Client.accueil")->with(compact('annonces',$annonces));}
        elseif ( Auth::user()->privilege == 1) {
            return view("Partenaire.accueil");
        }
        else
            return view("Admin.accueil");    }
   /* public function accueilClient()
    {
        $annonces = Annonce::all;
        $annonce = $annonces->get();
        return view('Client.accueil')->with(compact('annonce', 'annonces'));
    }*/


    
}
