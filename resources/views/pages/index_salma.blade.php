@extends('layouts.appp')

@section('content')
<br> <br> <br> <br>
     <div class="jumbotron text-center">
            <h1 class="cover-heading">CarDealer</h1>
            <h2>Besoin d'une voiture ?</h2> <br>
            <p class="lead">Votre location de voiture devient simple, rapide et économique avec CarDealer </p>
            <p class="lead">
              <a href="{{ route('login') }}" class="btn btn-lg btn-info">Login</a>
              <a href="{{ route('register') }}" class="btn btn-lg btn-success">Sign Up</a>
            </p>
      </div>

@endsection