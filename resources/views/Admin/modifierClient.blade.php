@include('layouts.admin')

    <div class="container">

      <a href="{{ route('A_ClientList') }}">Retour à la liste</a>
      <h1>Editer le client</h1>
 
      {{ Form::open( [ 'url' => URL::action('UsersController@updateUser', $client ), 'method' => 'post'])}}
        <p>{{ Form::label('id', 'Id :') }} {{ Form::text('id', $client->id, array('disabled' => 'disabled')) }}</p>
        <p>{{ Form::label('name', 'Nom Complet :') }} {{ Form::text('name',$client->name) }}</p>
        <p>{{ Form::label('email', 'Email :') }} {{ Form::text('email',$client->email) }}</p>
        <p>{{ Form::label('city', 'Ville :') }} {{ Form::text('city',$client->city) }}</p>
        <p>{{ Form::label('tel', 'Tel :') }} {{ Form::text('tel',$client->tel) }}</p>

         {{ Form::submit() }}
      {{ Form::close() }}
   </body>
</html>