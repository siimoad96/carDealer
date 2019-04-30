@include('layouts.admin')

    <div class="container">

      <a href="{{ route('A_PartenaireList') }}">Retour à la liste</a>
      <h1>Editer le partenaire</h1>
 
      {{ Form::open( [ 'url' => URL::action('UsersController@updateUser', $partenaire ), 'method' => 'post'])}}
        <p>{{ Form::label('id', 'Id :') }} {{ Form::text('id', $partenaire->id, array('disabled' => 'disabled')) }}</p>
        <p>{{ Form::label('name', 'Nom Complet :') }} {{ Form::text('name',$partenaire->name) }}</p>
        <p>{{ Form::label('email', 'Email :') }} {{ Form::text('email',$partenaire->email) }}</p>
        <p>{{ Form::label('city', 'Ville :') }} {{ Form::text('city',$partenaire->city) }}</p>
        <p>{{ Form::label('tel', 'Tel :') }} {{ Form::text('tel',$partenaire->tel) }}</p>

         {{ Form::submit() }}
      {{ Form::close() }}
   </body>
</html>