@extends('layouts.client')

@section('content')

        <h1  ></h1>
        <div >
            <h3>Les informations de l'annonce choisie </h3><br><br>
                </div>
            <form type="POST" action="/Client/reserverAnnonce">


            {{ csrf_field() }}
                {{ method_field('patch') }}
            <div class="form-group">
                    <label for="type">Title</label>
                        @foreach($reservations as $reservation)

                            <p>{{$reservation -> comment }}</p>

                        @endforeach                                  
                    </select>               
                     </div>
                <div class="form-group">
                    <label for="type">Ville</label>
                    <select type="text" class="form-group" name = "ville">
                        @foreach($reservations as $reservation)

                            <option>{{$reservation -> city }}</option>

                        @endforeach                                  
                    </select>               
                     </div>
                
                <div class="form-group">
                    <label for="type">Prix</label>
                    <select type="text" class="form-group" name = "marque">
                        @foreach($reservations as $reservation)

                            <option>{{$reservation -> price }}</option>

                        @endforeach                                  
                    </select>               
                     </div>
                <div class="form-group">
                    <label for="type">De</label>
                        @foreach($reservations as $reservation)

                            <option>{{$annonce -> from }}</option>

                        @endforeach                                  
                    </select>        
                </div>
                <div class="form-group">
                    <label for="type">A</label>
                    <select type="text" class="form-group" name = "modele">
                        @foreach($reservations as $reservation)

                            <option>{{$reservation -> to }}</option>

                        @endforeach                                  
                    </select>   
                <div class="form-group">
                    <label for="date">Date</label>
                    @foreach($reservations as $reservation)

                        <option>{{$reservation -> date }}</option>

                        @endforeach                 
                         </div>
                <br> <br>
                <button type="submit" class="btn btn-lg btn-info" >Reserver</button>
                
               
                </form>
            
        </div>
        


@endsection