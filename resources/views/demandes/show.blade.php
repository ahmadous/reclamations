<x-app-layout>
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">titre: {{$demande[0]->title}}</h4>
                <hr>
                <div class="card-text mt-3">
                    <p class=" text-primary">description:</p> <p><br> {{$demande[0]->description}}</p> </div>
                <div class="card-text mt-3 "> <p class=" text-primary">status de la demande: {{ $demande[0]->status }}</p> </div>
            </div>
        </div>
    </div>
</x-app-layout>
