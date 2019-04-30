@include('layouts.admin')

    
<div class="container">
        
            <br> <br> <br>
     
        
                
            <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Tél</th>
                        <th>Modifier client</th>
                        <th>Supprimer client</th>
        
                    </tr>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->tel }}</td>
       <td><a href="{{ URL::action('UsersController@editClient', $client->id) }}" class="button">Modifier</a></td>
       <form method = 'DELETE' action="URL::action('UsersController@deleteClient')">
        <td><a href="{{ , $client->id) }}" class="button">Supprimer</a></td>                                      
       </form>
    </tr>
                    @endforeach
                    </table>
                  
                
        </table>

   </div>

