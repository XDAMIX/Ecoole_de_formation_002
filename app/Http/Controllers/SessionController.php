<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Prof;
use App\Models\Inscription;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cookie;


class SessionController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }


    
    public function index() {
        // $ListeSessions = Session::orderBy('id', 'desc')->get();
        $ListeSessions = Session::all();
        // $ListeSessions = Session::orderBy('created_at', 'desc')->get();

        return view('admin/sessions/index',['sessions'=>$ListeSessions]);

    }
    
    public function create(){

        $formations = Formation::all();
        $profs = Prof::all();
        
        return view('admin/sessions/ajouter',['formations'=>$formations,'profs'=>$profs]);

    }

   

    public function store(Request $request) {

        $nvsession = new Session();

        $nvsession->nom = $request->input('nom');
        $nvsession->formation = $request->input('formation');
        $nvsession->prof = $request->input('prof');
        
        $nom = $request->input('nom');
        
        $nvsession->save();
        
        Alert::success( $nom,' a bien été enregistré');
        return redirect('/admin/session');
    }
 
    public function edit($id) {
        $session = Session::find($id);

        $listeFormations = Formation::all();
        $listeProfs = Prof::all();

        return view('admin/sessions/modifier',['session' => $session, 'formations'=>$listeFormations,'profs'=>$listeProfs]);
    }

    public function voir($id){
        $session = Session::find($id);

        $sessionname = $session->nom;
        // $inscription = Inscription::all();
        $inscriptions = Inscription::where('session',$sessionname)->where('contact',true)->get();
        return view('admin/sessions/voir',['sessions'=>$session,'inscriptions'=>$inscriptions]);
    }

    
    public function update(Request $request,$id) {
        $session = Session::find($id);

        $session->nom = $request->input('nom');
        $session->formation = $request->input('formation');
        $session->prof = $request->input('prof');
        // ajouter le code pour modifier la table etudiant 
        $session->save();
        Alert::success('Votre session a bien été modifiée');
        return redirect('/admin/session');
    }

    public function destroy($id) {
        $session = Session::find($id);
        $session->delete();     

        
        return redirect('/admin/session');
    }
                                        // les funcion pou statut 
    public function statut_enattente($id){
        $session = Session::find($id);
        $session->statut = 'En attente';
        $nom = $session->nom;
        $session->save();
        Alert::success('Statut de la  session '.$nom.' a bien été modifiée');
        return redirect('/admin/session');
    }
    public function statut_encours($id){
        $session = Session::find($id);
        $session->statut = 'En cours';
        $date=date('d/m/20y');
        $session->date_debut = $date;
        $nom = $session->nom;
        $session->save();
        Alert::success('La Session '.$nom.' est en cours ');
        // return redirect('/admin/session');
        return redirect()->back();
    }


    public function statut_termine($id){
        $session = Session::find($id);
        $session->statut = 'Termine';
        $date=date('d/m/20y');
        $session->date_fin = $date;
        $nom = $session->nom;
        $session->save();
        Alert::success('la session '.$nom.' a bien été Terminé');

        return redirect()->back()->with('telechargertout', true);
        
         // pour Stocker la position actuelle dans les cookies
            //  Cookie::queue('scroll_position', 'session-list', 60);

        // return redirect('/admin/session');
        // return redirect()->back();
        // return redirect('/admin/inscriptions/'.$id.'/imprimertout')
        // ->with('message', 'Redirected to imprimertout page');

    }

}
