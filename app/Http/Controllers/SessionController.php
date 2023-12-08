<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Prof;
use App\Models\Cour;
use App\Models\Inscription;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use PhpParser\NodeVisitor\FirstFindingVisitor;

use Carbon\Carbon;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

        // $ListeSessions = Session::all();
        $ListeSessions = Session::leftJoin('formations', function ($join_formations) {
            $join_formations->on('sessions.formation_id', '=', 'formations.id');
        })
        ->leftJoin('profs', function ($join_profs) {
            $join_profs->on('sessions.prof_id', '=', 'profs.id');
        })
        ->get([
            'sessions.*', 'formations.titre as formation', 'profs.nom as nom_prof', 'profs.prenom as prenom_prof',
        ]);

        return view('admin/sessions/index', ['sessions' => $ListeSessions]);
    }

    public function create()
    {

        $formations = Formation::all();
        $profs = Prof::all();

        return view('admin.sessions.ajouter', ['formations' => $formations, 'profs' => $profs]);
    }

    
    
    
    public function store(Request $request)
    {

        $nvsession = new Session();

        $nvsession->nom = $request->input('nom');
        $nvsession->formation_id = $request->input('formation');
        $nvsession->prof_id = $request->input('prof');

        $nom = $request->input('nom');

        $nvsession->save();

        Alert::success($nom, ' a bien été enregistré');
        return redirect('/admin/session');
    }

    public function edit($id)
    {
        $session = Session::find($id);
        $id_prof_session = $session->prof_id;
        $prof_session = Prof::find($id_prof_session);
        $id_formation = $session->formation_id;
        $formation_session = Formation::find($id_formation);
        $profs_formations = Cour::leftJoin('profs', function ($join_profs) {
            $join_profs->on('cours.prof_id', '=', 'profs.id');
        })
        // ->where('formation_id', $id_formation)->get();
        ->where('formation_id', $id_formation)->get([
            'cours.*','profs.*', 'profs.id as id_prof',
        ]);


        $listeFormations = Formation::all();
        
        return view('admin/sessions/modifier', ['session' => $session, 'formation_session' => $formation_session, 'prof_session' => $prof_session, 'profs' => $profs_formations,
        'liste_formations' => $listeFormations]);
    }

    
    
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
        
        $session->nom = $request->input('nom');
        $session->formation_id = $request->input('formation');
        $session->prof_id = $request->input('prof');

        $session->save();
        Alert::success('Votre session a bien été modifiée');
        return redirect('/admin/session');
    }

    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();
        
        
        return redirect('/admin/session');
    }


    
    public function voir($id)
    {
        $session = Session::leftJoin('profs', function ($join_profs) {
            $join_profs->on('sessions.prof_id', '=', 'profs.id');
        })
        ->leftJoin('formations', function ($join_formations) {
            $join_formations->on('sessions.formation_id', '=', 'formations.id');
        })
        ->where('sessions.id', $id)
        ->first([
            'sessions.*','formations.titre as titre_formation', 'profs.nom as nom_prof', 'profs.prenom as prenom_prof',
        ]);

        $etudiants = Etudiant::where('session_id', $id)->get();


        // return response()->json($session);
        return view('admin.sessions.voir', ['session' => $session, 'etudiants' => $etudiants]);
    }


    // les funcion pou statut 
    public function statut_enattente($id)
    {
        $session = Session::find($id);
        $session->statut = 'En attente';
        $nom = $session->nom;
        $session->save();
        Alert::success('Statut de la  session ' . $nom . ' a bien été modifiée');
        return redirect('/admin/session');
    }
    public function statut_encours($id)
    {
        $session = Session::find($id);
        $session->statut = 'En cours';
        $date = Carbon::today();
        $session->date_debut = $date;
        $nom = $session->nom;
        $session->save();
        Alert::success('La Session ' . $nom . ' est en cours ');
        // return redirect('/admin/session');
        return redirect()->back();
    }
    
    
    public function statut_termine($id)
    {
        $session = Session::find($id);
        $session->statut = 'Termine';
        $date = Carbon::today();
        $session->date_fin = $date;
        $nom = $session->nom;
        $session->save();
        Alert::success('la session ' . $nom . ' a bien été Terminé');
        
        return redirect()->back()->with('telechargertout', true);
        
        // pour Stocker la position actuelle dans les cookies
        //  Cookie::queue('scroll_position', 'session-list', 60);
        
        // return redirect('/admin/session');
        // return redirect()->back();
        // return redirect('/admin/inscriptions/'.$id.'/imprimertout')
        // ->with('message', 'Redirected to imprimertout page');
        
    }

    
    public function getProfs($id_formation)
    {
        try {

            // Récupérez les professeurs en fonction du titre de la formation
            $cours = Cour::leftJoin('profs', function ($join_profs) {
                $join_profs->on('cours.prof_id', '=', 'profs.id');
            })
            ->where('formation_id', $id_formation)->get([
                'cours.*','profs.*', 'profs.id as id_prof',
            ]);


            $profsFiltres = $cours;
    
            // Retournez les professeurs au format JSON
            return response()->json(['profs' => $profsFiltres]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);
    
            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
