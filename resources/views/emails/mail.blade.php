<x-app-layout>
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Motif rejet de reclamation</h4>
                        <form action="{{ route('post.reclamation') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title" >{{$demande[0]->title}}</h5>
                                        <select name="id" id="id">
                                            <option value="{{$demande[0]->user_id}}">id du demandeur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="motif" class="form-label">Motif</label>
                                        <textarea class="form-control" name="motif" id="motif" rows="3">votre demande a ete rejete ...</textarea>
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

</x-app-layout>
