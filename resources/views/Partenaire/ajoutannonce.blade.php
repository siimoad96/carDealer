
@extends('layouts.partenaire')  
@section('content')

<div class="flex-center position-ref full-height">
     <div class="content">
                
        <div class="container">
             <div class="title m-b-md">
                 <h1>Ajouter une annonce :</h1>
            </div>
             <form method="POST" action="ajoutannonce">

                 {{ csrf_field() }}
            
                 <label>Voiture:</label><br><br>
                <select type="text"  name = "vehicule">

                    @foreach($voitures as $voit)

                <option value="<?php echo $voit->id; ?>">
                                
                        {{  $voit->immatricule  }}  
                     </option>
                     @endforeach

                </select><br><br>

                <label>Titre:</label><br><br>
                <input type="text" name="title" ><br><br>


                <br><br><label>Ville:</label><br><br>
                <select type="text" name="city" >
                @foreach($villes as $v)
                <option value="{{ $v->city }}">
                {{ $v->city }}
                
                </option>
                @endforeach
                </select>
                <br><br>


                <br><br><label>Date:</label><br><br>
                <input type="date" name="date" ><br><br>


                <br><br><label>Disponibilité :</label><br><br>
                <label>De : </label>

                                <select type="text" class="form-control" name = "from">
                                    <?php
                                        for($i=0;$i<24;$i++)
                                        {
                                            if($i<10)
                                                echo "<option value=0".$i.">0".$i."h</option>";
                                            else
                                                echo "<option value=".$i.">".$i."h</option>";
                                        }
                                        
                                    ?>
                                </select>

                                <label> à :</label>
                                <select type="text" class="form-control" name = "to">
                                    <?php
                                        for($i=0;$i<24;$i++)
                                        {
                                            if($i<10)
                                                echo "<option value=0".$i.">0".$i."h</option>";
                                            else
                                                echo "<option value=".$i.">".$i."h</option>";
                                        }
                                        
                                    ?>
                                </select>

                                <br><br>
                                    <label>Prix par heure :</label> 
                                <input type="number" class="form-control" placeholder="DH" name = "price">
                                <br><br>
                                <input type="hidden" name="privilege" value="0" >
                                <input type="submit" value="Ajouter" class="btn btn-lg btn-info" name = "submit">
                                <br><br>
                    </form>
                </div>
            </div>
        </div>
@endsection