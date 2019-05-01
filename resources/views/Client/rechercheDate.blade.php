@extends('layouts.client')

@section('content')

        <h1  ></h1>
        <div >

            <h3>Veuillez remplire les champs</h3><br><br>
                <form action=""  method="POST">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <div class="form-group">

                        @foreach($annonces as $annonce)
                            <input type="hidden" name="id" value='{{$annonce->id}}'>
                            <input type="hidden" name="voiture_id" value='{{$annonce->voiture_id}}'>
                        @endforeach    

                    <label for="type">Ville</label>
                    <select type="text" class="form-group" name = "ville" required=required>
                        @foreach($villes as $ville)

                            <option>{{$ville->city}}</option>

                        @endforeach 
                    </select>
                     </div>
                
                <div class="form-group">
                    <label for="type">Marque</label>
                    <select type="text" class="form-group" name = "marque">
                        @foreach($marques as $marque)

                            <option>{{$marque->marque }}</option>

                        @endforeach                                  
                    </select>               
                     </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select type="text" class="form-group" name = "type">
                        @foreach($types as $type)

                            <option>{{$type->type }}</option>

                        @endforeach                                  
                    </select>        
                </div>
                <div class="form-group">
                    <label for="type">Modele</label>
                    <select type="text" class="form-group" name = "modele">
                        @foreach($modeles as $modele)

                            <option>{{$modele->modele }}</option>

                        @endforeach                                  
                    </select>   
               
                <br> <br>
                <button type="submit" class="btn btn-lg btn-info" >Rechercher</button>
                
               
                </form>
            
        </div>
        


@endsection