<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listeinformations = Information::all();
        return view('admin.index',[ 'informations'=>$listeinformations]);
        
    }

    public function connecter()
    {
        return view('admin.connexion');
    }

    public function inscrir()
    {
        return view('auth.register');
    }
}
