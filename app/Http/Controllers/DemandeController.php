<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\User;
use App\Models\demande;
use Illuminate\Http\Request;
use App\Notifications\demandeRejet;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Notifications\demandeCreated;
use App\Notifications\demandeTraiter;
use App\Notifications\demandeValidate;
use Illuminate\Support\Facades\Notification;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = demande::where('status', 'en_attente')->get();
        $a = count($demandes);
        $mesdemandes = demande::all();
        $b = count($mesdemandes);
        $demandeUsers = demande::where('user_id', auth()->user()->id)->get();
        $c = count($demandeUsers);
        $users = user::all();
        $d = count($users);
        $demandes_traite = demande::where('status', 'en_traitement')->get();
        $e = count($demandes_traite);
        $demandes_rejet = demande::where('status', 'en_rejet')->get();
        $f = count($demandes_rejet);
        $demande_en_traitement = demande::where('name_traiteur', auth()->user()->name)->get();
        $g = count($demande_en_traitement);
        $admins = user::where('role', 2)->get();
        $h = count($admins);
        return view('demandes.liste', [
            'demandes' => $demandes,
            'a' => $a,
            'mesdemandes' => $mesdemandes,
            'b' => $b,
            'demandeUsers' => $demandeUsers,
            'c' => $c,
            'users' => $users,
            'd' => $d,
            'demandes_traite' => $demandes_traite,
            'e' => $e,
            'demandes_rejet' => $demandes_rejet,
            'f' => $f,
            'demande_en_traitement'=> $demande_en_traitement,
            'g'=>$g,
            'admins'=>$admins,
            'h'=>$h,
        ]);
    }

    public function create()
    {
        return view('demandes.new');
    }
    public function store(Request $request)
    {

        // validation du formulaire
        $request->validate([
            'title' => 'required|unique:demandes',
            'description' => 'required',
        ]);
        // instanciation de demande à partir du formulaire
        $demande = new demande($request->all());
        $user = user::where('role', 2)->get();
        Notification::route('mail', $user)->notify(new demandeCreated($demande));
        // identifier l'id d'un utilisateur dans phpMyAdmin et l'associer à l'utilisateur
        $demande->user_id = auth()->user()->id;
        $demande->name = auth()->user()->name;
        $demande->save();
        return redirect()->route('demandes.index');
    }

    public function edit($id)
    {
        if (!Gate::allows('access-admin')) {
            abort(403, 'vous ne pouvez pas modifier la demande');
        }
        $demande = demande::where('id', $id)->get();
        // return $demande;
        return view('demandes.edit', ['demande' => $demande]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $status = $request->input('status');

        $demandeValidate = demande::where('id', $id)->update([
            'status' => $status,
            'name_traiteur'=>auth()->user()->name,
        ]);
        if($status=="en_rejet"){
            $demande=demande::where('id', $id)->get();
            return view('emails.mail',['demande'=>$demande]);
        }
        if ($demandeValidate) {
            // $demande = new demande($id);
            // $user = user::where('id', $demande->user_id)->get();
            // $user->notify(new demandeCreated($demande));
            $demande = demande::where('id', $id)->get();
            if($status=="en_traitement"){ // si le status est en traitement
            $user = User::where('id', $demande[0]->user_id)->get();
            // $user->notify(new demandeCreated($demande[0]));
             Notification::route('mail', $user)->notify(new demandeTraiter($demande[0]));
            }
            if ($status == "validee") {// si le status est valide
                $user = User::where('id', $demande[0]->user_id)->get();
            // $user->notify(new demandeCreated($demande[0]));
               Notification::route('mail', $user)->notify(new demandeValidate($demande[0]));
            }
            return redirect()->route('demandes.index');
        } else {
            echo "<h1>la modification a echoue</h1>";
        }
    }

    public function editStatus($id)
    {
        $demande = demande::where('id', $id)->get();
        return view('demandes.status', ['demande' => $demande]);
    }
    public function show($id)
    {
        $demande = demande::where('id', $id)->get();
        return view('demandes.show', compact('demande'));
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $title = $request->input('title');
        $description = $request->input('description');
        // $description= $request->input('description');

        $demandeValidate = demande::where('id', $id)->update([
            'title' => $title,
            'description' => $description,
        ]);
        if ($demandeValidate) {
            return redirect()->route('demandes.index');
        } else {
            echo "<h1>la modification a echoue</h1>";
        }
    }
    public function storeMail(Request $request){
        $Motif=$request->input('motif');
        $id=$request->input('id');
        $user=user::where('id',$id)->get();
        $users = ['email' => $user[0]->email, 'Motif' => $Motif];
        Mail::to($users['email'])->send(new email($users));
        return redirect()->route('demandes.index');


    }
}
