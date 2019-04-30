@extends('layouts.client')


@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-2 mr-4">
      {{-- Profile Image --}}
      @if (auth()->user()->profile_image)
      <img src="{{ asset(auth()->user()->profile_image) }}" alt="Your Profile Image" class="profile-image img-rounded p-1">
      @else
      <img src="{{ asset('/img/user.png') }}" alt="Your Profile Image" class="profile-image-default img-rounded p-1">
      @endif
    </div>
    <div class="col-sm-8">
      <h3>Mon Profile
        <br>
      </h3>
      <hr>
        <table class="table table-striped">
                  <tr>
                    <td>Nom Complet</td>
                    <td>{{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <td>Tél</td>
                    <td>{{Auth::user()->tel}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                  <tr>
                    <td>Ville</td>
                    <td>{{Auth::user()->city}}</td>
                  </tr>
        </table>

      <a href="{{route('profile_admin.update')}}" class="btn btn-lg btn-info"> Modifier </a>
    </div>
  </div>
</div>
            
        


@endsection