<?php

namespace App\Http\Controllers;

use App\Models\demande;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        $mesdemandes = demande::all();
        $a=count(demande::all());
        $demandes = demande::where('status', 'en_attente')->get();
        $b=count(demande::where('status','en_attente')->get());

        $demandes_traite = demande::where('status', 'en_traitement')->get();
        $c=count(demande::where('status','en_traitement')->get());
        $users = user::all();
        $d =count( user::all() );

        $demandes_rejet = demande::where('status', 'en_rejet')->get();
        $e=count(demande::where('status','en_rejet')->get());
        $f = count(user::where('role', 2)->get());
        $demandeValide = demande::where('status', 'validee')->get();
        $g=count($demandeValide);
        $admins = user::where('role', 2)->get();
        $h = count($admins);
        $demandeUsers = demande::where('user_id', auth()->user()->id)->get();
        $i = count($demandeUsers);

        return view('dashboard',[
            'mesdemandes'=>$mesdemandes,
            'a'=>$a,
            'demandes'=>$demandes,
            'b'=>$b,
            'demandes_traite'=>$demandes_traite,
            'c'=>$c,
            'users'=>$users,
            'd'=>$d,
            'demandes_rejet'=>$demandes_rejet,
            'e'=>$e,
            'f'=>$f,
            'demande_valide'=>$demandeValide,
            'g'=>$g,
            'admins'=>$admins,
            'h'=>$h,
            'demandeUsers'=>$demandeUsers,
            'i'=>$i,
        ]);
    }
    public function show($id)
    {
        $user = user::where('id',$id)->get();
        $demandes = demande::where('name_traiteur',$user[0]->name)->get();
        return view('admin.show',[
            'user'=>$user,
            'demandes'=>$demandes,
        ]);
    }
}
