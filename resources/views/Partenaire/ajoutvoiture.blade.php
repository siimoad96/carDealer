@extends('layouts.partenaire')

@section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">

                <div class="container">
                        <h1>Ajouter une  voiture a louer :</h1> <br>
                    <form method="POST" action="{{ route('voiture.add') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input  type="file" class="form-control" name="car_image">
                        <br><br>
                        <input type="text" class="form-control" placeholder="Marque" name = "marque">
                        <br><br>
                        <input type="text" class="form-control" placeholder="type" name = "type">
                        <br><br>
                        <input type="text" class="form-control" placeholder="Immatricule" name = "immatricule">
                        <br><br>
                        <input type="text" class="form-control" placeholder="Modele" name = "modele">
                        <br><br>
                        <input type="number" class="form-control" placeholder="Compteur" name = "compteur">
                        <br><br>
                        <input type="text" class="form-control" placeholder="boite" name = "boite">
                        <br><br>
                        <input type="text" class="form-control" placeholder="carburant" name = "carburant">
                        <br><br>
                       
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                        <input type="submit" class="btn btn-lg btn-info" value="Ajouter" name = "submit">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>

@endsection