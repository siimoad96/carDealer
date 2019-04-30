@extends('layouts.client')

@section('content')

        <h1  ></h1>
        <div >

            <h3>Les annonces disponibles </h3><br><br>
                </div>
            <form type="POST" action="/Client/reserverAnnonce">

                @foreach($annonces as $annonce)
                <input type="hidden" name="voiture_id" value='{{$annonce->voiture_id}}'>
                <div class="form-group"><input name="id" type="hidden" value="{{$annonce -> id}}"></div>
                <div class="form-group">{{$annonce -> title }}
               <button type="submit" class="btn btn-lg btn-info" >Consulter</button></div>

                @endforeach            
                </form>               
@endsection