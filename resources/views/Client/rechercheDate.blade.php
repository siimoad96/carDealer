@extends('layouts.client')

@section('content')

        <h1  ></h1>
        <div >

            <h3>Veuillez remplire les champs</h3><br><br>
                <form action="/Client/resultat"  method="POST">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <div class="form-group">

                        @foreach($annonces as $annonce)
                            <input type="hidden" name="id" value='{{$annonce->id}}'>
                            <input type="hidden" name="voiture_id" value='{{$annonce->voiture_id}}'>
                        @endforeach    

                    <label for="type">Ville</label>
                    <select type="text" class="form-group" name = "ville" required=required>
                        <option selected=true>Selectionner une ville</option>
                        @foreach($villes as $ville)

                            <option>{{$ville->city}}</option>

                        @endforeach 
                    </select>
                     </div>
                
                <div class="form-group">
                    <label for="type">Marque</label>
                    <select type="text" class="form-group" name = "marque">
                    <option selected=true>Selectionner une marque</option>

                        @foreach($marques as $marque)

                            <option>{{$marque->marque }}</option>

                        @endforeach                                  
                    </select>               
                     </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select type="text" class="form-group" name = "type">
                    <option selected=true>Selectionner un type</option>

                        @foreach($types as $type)

                            <option>{{$type->type }}</option>

                        @endforeach                                  
                    </select>        
                </div>
                <div class="form-group">
                    <label for="type">Modele</label>
                    <select type="text" class="form-group" name = "modele">
                    <option selected=true>Selectionner un modele</option>

                        @foreach($modeles as $modele)

                            <option>{{$modele->modele }}</option>

                        @endforeach                                  
                    </select>   
               
                <br> <br>
                <button type="submit" class="btn btn-lg btn-info" >Rechercher</button>
                
               
                </form>
            
        </div>
        


@endsection