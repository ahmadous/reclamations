<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function edit($id){
        $user= user::where('id',$id)->get();
    return view('users.edit',['user'=>$user]);

    }
    public function update(Request $request){
        $id = $request->id;
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $userValidated = user::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'role'=>$role,
        ]);

        if($userValidated){
            return redirect()->route('demandes.index');
        }
        else{
            echo "<h1>la modification a echoue</h1>";
        }
    }
}