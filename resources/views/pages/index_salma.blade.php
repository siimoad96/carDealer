@extends('layouts.appp')

@section('content')
<br> <br> <br> <br>
<div class="">
     <div class="jumbotron text-center">
     @foreach($annonces as $annonce)
     <div class="d-inline p-2">
     <h2>{{ $annonce->title }}</h2><br> <br>
     <h3>Prix:</h3><p>{{ $annonce->price}}</p><br>
     <h3>Ville:</h3><p>{{ $annonce->city}}</p><br>
    <?php $voiture = App\Voiture::find($annonce->voiture_id); ?>
     <h3>Voiture:</h3> <p><b>Marque:</b>   {{ $voiture->marque }}  {{  $voiture->type}}</p><br>
     <p><b>Modèle:</b>   {{ $voiture->modele }}</p><br>
     <p><b>Carburant:</b>   {{ $voiture->carburant }}</p><br>

     </div>
     @endforeach

     </div>
     <div class="jumbotron text-center" >
            <h1 class="cover-heading">CarDealer</h1>
            <h2>Besoin d'une voiture ?</h2> <br>
            <p class="lead">Votre location de voiture devient simple, rapide et économique avec CarDealer </p>
            <p class="lead">
              <a href="{{ route('login') }}" class="btn btn-lg btn-info">Login</a>
              <a href="{{ route('register') }}" class="btn btn-lg btn-success">Sign Up</a>
            </p>
      </div>
  </div>

@endsection
