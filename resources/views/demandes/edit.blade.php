<x-app-layout>
    @if (auth()->user()->role==1)
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification d'une demande de reclamation</h4>
                        <form action="update{{$demande[0]->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label" >title</label>
                                        <br>{{$demande[0]->title}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <br>{{$demande[0]->description}}
                                    </div>
                                </div>
                                <div class="col-12 mt-6">
                                    <div class="mb-3">
                                        <select name="status" id="status">
                                            <option value="validee">validee</option>
                                            <option value="en_rejet">en_rejet</option>
                                        </select>
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
</div>
    @else
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification d'une demande de reclamation</h4>
                        <form action="update{{$demande[0]->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label" >title</label>
                                        <br>{{$demande[0]->title}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <br>{{$demande[0]->description}}
                                    </div>
                                </div>
                                <div class="col-12 mt-6">
                                    <div class="mb-3">
                                        <select name="status" id="status">
                                            <option value="en_attente">en_attente</option>
                                            <option value="en_traitement">en_traitement</option>
                                            <option value="validee">validee</option>
                                            <option value="en_rejet">en_rejet</option>
                                        </select>
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
    </div>
    @endif
</x-app-layout>
