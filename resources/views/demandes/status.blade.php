<x-app-layout>
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification du status d'une demande de reclamation</h4>
                        <form action="Update{{ $demande[0]->id }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 mx-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $demande[0]->title }}">
                                    </div>
                                    <div class="col-12 mx-6 mt-3">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3">{{ $demande[0]->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="reset"  class=" btn-secondary">Vider</button>
                                        <button type="submit" class="btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
