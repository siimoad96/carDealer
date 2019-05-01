@extends('layouts.client')

@section('content')

        <h1  ></h1>
        <div >

            <h3>Veuillez choisir un date </h3><br><br>
                </div>
            <form type="POST" action="/Client/rechercheDate">
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Entrer la date" required=required>
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-info" >Rechercher</button>
                </div>
            </form>                   
@endsection