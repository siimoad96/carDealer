@extends('layouts.client')
        
    <br><br>
    <div align="center" class="jumbotron">
        <br><br><br>
            <h1>CarDealer</h1>
            <br>
            <p class="lead">LOCATION DE VOITURE AU MAROC </p>
            <br><br> 
            <p><a class="btn btn-lg btn-info" href="/Client/recherche" role="button">Rechercher une voiture</a></p>
    </div>



        <!-- les Annonces -->
        <div class="row">
                @foreach($annonces as $annonce)
                <div class="col-lg-4">
                <h2>{{$annonce->title}}</h2>
                <p>{{$annonce->city}} <br> {{$annonce->price}} <br> {{$annonce->date}}
                </p>
                <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
                @endforeach
               
            </div>
     