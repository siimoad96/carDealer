@extends('layouts.client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')

        <h1  ></h1>
        <div >

            <h3>Veuillez selectionner les champs </h3><br><br>
                </div>
            <form type="POST" action="/Client/rechercheDate">
                <div class="form-group">
                <select name="date" id="date" class="form-control input-lg dynamic" data-dependent="city">
                    <option value="">Selectionner un date</option>
                        @foreach($annonces as $annonce)
                        <option value="{{ $annonce->date}}">{{ $annonce->date }}</option>
                        @endforeach
                </select>                
                </div>

                <div class="form-group">
                <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="marque">
                        <option value="">Selectionner une ville</option>
                </select>
                </div>


                <div class="form-group">
                <select name="marque" id="marque" class="form-control input-lg dynamic" data-dependent="type">
                        <option value="">Selectionner une marque</option>
                </select>
                </div>


                <div class="form-group">
                <select name="type" id="type" class="form-control input-lg dynamic" data-dependent="modele">
                        <option value="">Selectionner un type</option>
                </select>
                </div>


                <div class="form-group">
                <select name="modele" id="modele" class="form-control input-lg dynamic">
                        <option value="">Selectionner un modele</option>
                </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-lg btn-info" >Rechercher</button>
                </div>
            </form>                   
@endsection

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('recherche.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#date').change(function(){
  $('#city').val('');
  $('#marque').val('');
  $('#type').val('');
  $('#modele').val('');

 });

 $('#city').change(function(){
  $('#marque').val('');
  $('#type').val('');
  $('#modele').val('');

 });
 
 $('#marque').change(function(){
  $('#type').val('');
  $('#modele').val('');

 });

 $('#type').change(function(){
  $('#modele').val('');

 });
});
</script>
