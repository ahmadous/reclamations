<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(auth()->user()->role == 1 || auth()->user()->role == 2)
        @if (auth()->user()->role==1)
        <div class="container">
            <div class="row">
              <div class="col">

        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">  <a href="#user"> Nombre d'Utilisateur <br> </a></div>
            <div class="card-body">
              <h5 class="card-title"> {{$d}}</h5>

            </div>
          </div>
              </div>
              <div class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <a href="#admin"> Nombre d'Admin <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title">{{$h}}</h5>

                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <a href="#all"> Nombre de tous les Demandes <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title"> {{$a}}</h5>

                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"><a href="#traitement" >Demandes en Traitement <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title">  {{$c}}</h5>

                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header"><a href="#attente" >Demandes en attente <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title"> {{$b}} </h5>

                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header"><a href="#rejet" >Demandes rejetee <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title">{{$e}}</h5>
                    </div>
                  </div>
              </div>
            </div>
          </div>
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header"><a href="#validee">Demandes validee <br> </a></div>
                                <div class="card-body">
                                  <h5 class="card-title">{{$g}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                          </div>
                          {{-- <div class="col">
                            Column
                          </div>
                          <div class="col">
                            Column
                          </div> --}}
                        </div>
                      </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0" id="user">
                                <p>Liste des utilisateurs</p>
                            </blockquote >
                            <div class="table-responsive-sm">
                                <button  class=" btn btn-secondary">nombre: <br>{{$d}}</button>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">NOM</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="">
                                                <td scope="row">{{$loop->index+1}}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->role == 0)
                                                        Client
                                                    @elseif ($user->role == 1)
                                                        Asistancia

                                                    @else
                                                        administrateur
                                                    @endif
                                                </td>
                                               <td><a  href="{{url('destroyUser'.$user->id)}}" class="btn btn-danger btn-md align-item-center">Supprimer</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0" id="admin">
                                                <p>Liste des admin</p>
                                            </blockquote>
                                            <div class="table-responsive-sm">
                                                <button  class=" btn btn-secondary">nombre: <br>{{$h}}</button>
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">N°</th>
                                                            <th scope="col">NOM</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Status</th>
                                                            <th colspan="2">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($admins as $user)
                                                            <tr class="">
                                                                <td scope="row">{{$loop->index+1}}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    @if($user->role == 0)
                                                                        Client
                                                                    @elseif ($user->role == 1)
                                                                        Asistancia

                                                                    @else
                                                                        administrateur
                                                                    @endif
                                                                </td>
                                                                <td><a  href="{{url('destroyUser'.$user->id)}}" class="btn btn-danger btn-md">Supprimer</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                            </div>
                            <div class="table-responsive-sm">
                                <blockquote class="blockquote mb-0" id="attente">
                                    <p>Liste des demandes en attente</p>
                                </blockquote>
                                <button  class=" btn btn-secondary">nombre: <br>{{$b}}</button>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Reclameur</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2" class="center">Action</th>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <blockquote class="blockquote mb-0" id="all">
                                <p>Liste de tous les  demandes</p>
                            </blockquote>
                            <div class="table-responsive-sm">
                                <button  class="btn btn-secondary">nombre: <br>{{$a}}</button>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Reclameur</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mesdemandes as $demande)
                                        <tr class="">
                                            <td scope="row">{{$loop->index+1}}</td>
                                            <td>{{ $demande->name }}</td>
                                            <td>{{ $demande->title }}</td>
                                            <td>{{ $demande->description }}</td>
                                            <td>{{ $demande->status}}</td>
                                            <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                                       </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <blockquote class="blockquote mb-0" id="traitement">
                                <p>Liste des demandes en traitement</p>
                            </blockquote>
                            <div class="table-responsive-sm">
                                <button  class="btn btn-secondary">nombre: <br>{{$c}}</button>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Reclameur</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Traiteur de la demande</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($demandes_traite as $demande)
                                        <tr class="">
                                            <td scope="row">{{$loop->index+1}}</td>
                                            <td>{{ $demande->name }}</td>
                                            <td>{{ $demande->title }}</td>
                                            <td>{{ $demande->description }}</td>
                                            <td>{{$demande->name_traiteur}}</td>
                                            <td>{{ $demande->status}}</td>
                                            <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                                            <td><a href="{{ url('/edit'.$demande->id) }}" class="btn btn-md btn-warning">Editer</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <blockquote class="blockquote mb-0" id="rejet">
                                <p>Liste des demandes rejeter</p>
                            </blockquote>
                            <div class="table-responsive-sm">
                                <button  class="btn btn-secondary">nombre: <br>{{$e}}</button>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Reclameur</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Traiteur de la demande</th>
                                            <th scope="col">Status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($demandes_rejet as $demande)
                                        <tr class="">
                                            <td scope="row">{{$loop->index+1}}</td>
                                            <td>{{ $demande->name }}</td>
                                            <td>{{ $demande->title }}</td>
                                            <td>{{ $demande->description }}</td>
                                            <td>{{$demande->name_traiteur}}</td>
                                            <td>{{ $demande->status}}</td>
                                            <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                                       </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
                <blockquote class="blockquote mb-0" id="validee">
                    <p>Liste des demandes valider</p>
                </blockquote>
                <div class="table-responsive-sm">
                    <button  class="btn btn-secondary">nombre: <br>{{$g}}</button>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Reclameur</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Traiteur de la demande</th>
                                <th scope="col">Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demande_valide as $demande)
                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->name }}</td>
                                <td>{{ $demande->title }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>{{$demande->name_traiteur}}</td>
                                <td>{{ $demande->status}}</td>
                                <td><a href="{{url('/show'.$demande->id)}}" class="btn btn-md btn-primary">Voir</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            </div>
        </div>
    </div>
        @else

        <div class="container">
            <div class="row">
              <div class="col">
                <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header"><a href="{{route('demandes.index')}}">Demandes en Attente <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title"> {{$b}}</h5>
                    </div>
                </div>
            </div>

               <div class="col">
                <div class="card text-danger bg-info mb-3" style="max-width:18rem;">
                    <div class="card-header"><a href="{{route('demandes.index')}}">Demandes traitee <br> </a></div>
                    <div class="card-body">
                      <h5 class="card-title">
                        @foreach ($demandes_traite as $demande )
                            @if ($demande->name_traiteur==auth()->user()->name)
                                {{$c}}
                                @break
                            @else
                                0
                                @break
                            @endif
                        @endforeach
                        </h5>
                    </div>
                </div>
            </div>

              {{-- <div class="col">
                Column
              </div> --}}
            </div>
          </div>

        @endif
    @else
        <div class="container">
            <div class="row g-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Formulaire d'ajout d'une demande de reclamation</h4>
                            <form action="{{ route('demandes.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                aria-describedby="helptitleId" placeholder="title de la de la demandee">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="reset" class="btn btn-secondary">Vider</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
</x-app-layout>
