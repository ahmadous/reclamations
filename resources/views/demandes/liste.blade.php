<x-app-layout>
    <x-slot>

    </x-slot>
    @if (auth()->user()->role == 2)
    @foreach ($demande_en_traitement as $demande)
        @if($demande->name_traiteur==auth()->user()->name)
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Liste des demandes qui me sont assigne</p>
                </blockquote>
                <div class="table-responsive-sm">
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

                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->name }}</td>
                                <td>{{ $demande->title }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>{{ $demande->status}}</td>
                                <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                                <td><a href="{{ url('/edit'.$demande->id) }}" class="btn btn-md btn-warning">Editer</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Liste des demandes en attente</p>
                  </blockquote>
                <div class="table-responsive-sm">

                    <button  class=" btn btn-secondary">nombre: <br>{{$a}}</button>
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
    @else
    <blockquote class="blockquote mb-0">
        <p>Liste de tous mes  demandes</p>
      </blockquote>
    <div class="table-responsive-sm">
        <button  class="btn btn-secondary">nombre: <br>{{$c}}</button>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Reclamateur</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandeUsers as $demande)
                <tr class="">
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{ $demande->name }}</td>
                    <td>{{ $demande->title }}</td>
                    <td>{{ $demande->description }}</td>
                    <td>{{ $demande->status}}</td>
                    <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                    <td><a href="{{ url('/Edit'.$demande->id) }}" class="btn btn-md btn-warning">Editer</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>
