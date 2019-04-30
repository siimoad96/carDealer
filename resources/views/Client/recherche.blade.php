@extends('layouts.client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')

        <h1  ></h1>
        <div >

            <h3>Veuillez selectionner les champs </h3><br><br>
                </div>
                <form method="POST" action="Client/resultat">
          <div class="form-group">
            <label for="">Your date</label>
            <select class="form-control" name="date" id="date">
              <option value="0" disable="true" selected="true">=== Select date ===</option>
                @foreach ($annonces as $key => $value)
                  <option value="{{$value->id}}">{{ $value->date }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Your city</label>
            <select class="form-control" name="city" id="city">
              <option value="0" disable="true" selected="true">=== Select city ===</option>
            </select>
          </div>


</form>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $('#date').on('change', function(e){
        console.log(e);
        var date = e.target.value;
        $.get('/json-city?date=' + date,function(data) {
          console.log(data);
          $('#city').empty();
          $('#city').append('<option value="0" disable="true" selected="true">=== Select city ===</option>');

          $.each(data, function(index, cityObj){
            $('#city').append('<option value="'+ cityObj.id +'">'+ cityObj.name +'</option>');
          })
        });
      });



    </script>

@endsection

