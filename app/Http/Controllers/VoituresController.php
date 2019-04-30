<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Voiture;
use Auth;
use App\User;
use App\Traits\UploadTrait;

class VoituresController extends Controller
{
    public function ajoutvoiture()
    {
        $title = 'Ajouter une voiture';
        return view('Partenaire.ajoutvoiture')->with('title', $title);
    }
    public function ajoutVoitureSuccess( Request $request)
    {
        $request->validate([
            'marque'              =>  'required',
            'type'              =>  'required',
            'immatricule'              =>  'required',
            'modele'              =>  'required',
            'compteur'              =>  'required',
            'boite'              =>  'required',
            'carburant'              =>  'required',
            'car_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current user
        //$voiture = Voiture::findOrFail(auth()->user()->id);
        
        $voiture = new Voiture();
        $voiture->marque = request('marque');
        $voiture->type = request('type');
        $voiture->immatricule = request('immatricule');
        $voiture->modele = request('modele');
        $voiture->compteur = request('compteur');
        $voiture->boite = request('boite');
        $voiture->carburant = request('carburant');
        $voiture-> car_image = request('car_image');
        $voiture->partenaire_id =  Auth::id();

        if ($request->has('car_image')) {
            // Get image file
            $image = $request->file('car_image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $voiture->car_image = $filePath;
        }
        // Persist user record to database
        $voiture->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Car added successfully.']);

    }


    //chercher les voitures d'un partenaire
   /* public function chercher(){

        $voiture =Voiture::where('partenaire_id',Auth::id());
        $voitures = Array('voiture'=>$voiture);
        return $voitures;    
    }*/
   /* public function uploadImage(Request $request){
        $this->validate($request,[
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $image = $request->file('select_file');
        $new_name = $rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        return back()->with('success','Image Uploaded Successfully')->with('path',$new_name);
    }*/
}
