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
                        <td>Modifier</td>
                        <td>Supprimer</td>


                    </tr>
                    @endforeach
                    </table>
                  
                
        </table>

   </div>

