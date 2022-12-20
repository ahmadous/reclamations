<x-app-layout>
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification d'une demande de reclamation</h4>
                        <form action="updateUser{{$user[0]->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label" >Nom</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$user[0]->name}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" value="{{$user[0]->email}}">
                                    </div>
                                </div>
                                <div class="col-12 mt-6">
                                    <div class="mb-3">
                                        <select name="role" id="role">
                                            <option value='0'>client</option>
                                            <option value='1'>asistancia</option>
                                            <option value='2'>admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-primary  bt">Enregistrer</button>
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
