<?php

namespace App\Http\Controllers;

use App\Models\demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }
        public function foo(){
            if(!Gate::allows('access-admin')){
                abort(403);
            }
            return   view('test');
        }
       
}