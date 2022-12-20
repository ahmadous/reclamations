<x-app-layout>
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">les demandes que {{$user[0]}} traite</h4>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Reclameur</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($demandes as $demande)
                        <tr class="">
                            <td scope="row">{{$loop->index+1}}</td>
                            <td>{{ $demande->name }}</td>
                            <td>{{ $demande->title }}</td>
                            <td>{{ $demande->description }}</td>
                            <td>{{ $demande->status}}</td>
                            <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                            <td><a href="{{ url('/edit'.$demande->id) }}" class="btn btn-md btn-warning">Editer</a></td>
                       </tr>
                     @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
