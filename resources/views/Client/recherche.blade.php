@extends('layouts.client')

@section('content')

    <div class="container">
      <div class="col-lg-4">
        <h2> </h2>

        <form method=POST action="/Client/resultat"> 
        {{ csrf_field() }}
                {{ method_field('patch') }}

        <div class="form-group">
            <label for="">Date</label>
            <select class="form-control" name="date" id="date">
              <option value="0" disable="true" selected="true">Selectionner un date</option>
 
              @foreach ($date as $key => $value)
                  <option value="{{$value->date}}">{{ $value->date }}</option>
                @endforeach
            </select>
          </div>

          
        <div class="form-group">
            <label for="">Ville</label>
            <select class="form-control" name="city" id="city">
              <option value="0" disable="true" selected="true">Selectionner une ville</option>
            </select>
          </div>

          
        <div class="form-group">
            <label for="">Marque</label>
            <select class="form-control" name="marque" id="marque">
              <option value="0" disable="true" selected="true">Selectionner une marque </option>
            </select>
          </div>

          
        <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" name="type" id="type">
              <option value="0" disable="true" selected="true">Selectionner un type</option>
            </select>
          </div>

          
        <div class="form-group">
            <label for="">Modele</label>
            <select class="form-control" name="modele" id="modele">
              <option value="0" disable="true" selected="true">Selectionner un modele</option>
            </select>
          </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script type="text/javascript">

        $('#date').on('change',function(e){
                console.log(e);
                var date=e.target.value;
                $.get('/Client/city?date=' + date,function(data){
                        console.log(data);
                        $('#city').empty();
                        $('#city').append('<option value="0" disable="true" selected="true">Selectionner une ville</option>');
                        
                        $('#marque').empty();
                        $('#marque').append('<option value="0" disable="true" selected="true">Selectionner une marque</option>');

                        $('#type').empty();
                        $('#type').append('<option value="0" disable="true" selected="true">Selectionner un type</option>');

                        $('#modele').empty();
                        $('#modele').append('<option value="0" disable="true" selected="true">Selectionner un modele</option>');

                        $.each(data,function(index,cityObj){
                                $('#city').append('<option value="'+ cityObj.city + '">'+ cityObj.city + '</option>');
                        })
                });
        });



        $('#city').on('change',function(e){
                console.log(e);
                var city=e.target.value;
                $.get('/Client/marque?city=' + city,function(data){
                        console.log(data);
                        $('#marque').empty();
                        $('#marque').append('<option value="0" disable="true" selected="true">Selectionner une marque</option>');

                        $.each(data,function(index,marqueObj){
                                $('#marque').append('<option value="'+ marqueObj.marque + '">'+ marqueObj.marque + '</option>');
                        })
                });
        });



        

        $('#marque').on('change',function(e){
                console.log(e);
                var marque=e.target.value;
                $.get('/Client/type?marque=' + marque,function(data){
                        console.log(data);
                        $('#type').empty();
                        $('#type').append('<option value="0" disable="true" selected="true">Selectionner un type</option>');

                        $.each(data,function(index,typeObj){
                                $('#type').append('<option value="'+ typeObj.type + '">'+ typeObj.type + '</option>');
                        })
                });
        });


        
        $('#type').on('change',function(e){
                console.log(e);
                var type=e.target.value;
                $.get('/Client/modele?type=' + type,function(data){
                        console.log(data);
                        $('#modele').empty();
                        $('#modele').append('<option value="0" disable="true" selected="true">Selectionner un modele</option>');

                        $.each(data,function(index,modeleObj){
                                $('#modele').append('<option value="'+ modeleObj.modele + '">'+ modeleObj.modele + '</option>');
                        })
                });
        });
        
        $('#modele').on('change',function(e){
                console.log(e);
                var modele=e.target.value;
                $.get('/Client/submit?modele=' + modele,function(data){
                        console.log(data);
                        $('#submit').empty();
                        $('#submit').append(' <button type="submit" class="btn btn-lg btn-info" >Rechercher</button>');

                        $.each(data,function(index,submitObj){
                                $('#submit').append('<button value="'+ submitObj.submit + '">'+ submitObj.submit + '</button>');
                        })
                });
        });
 
        
</script>


          <div class="form-group">
               <button type="submit" class="btn btn-lg btn-info" >Rechercher</button></div>

        </form>
</div>
</div>

@endsection