<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Formation;
use App\Models\Prof;
use App\Models\Cour;
use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Information;
use App\Models\Telephone;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use PhpParser\NodeVisitor\FirstFindingVisitor;

use PDF;
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
            ->orderBy('sessions.id', 'DESC')
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
                'cours.*', 'profs.*', 'profs.id as id_prof',
            ]);


        $listeFormations = Formation::all();

        return view('admin/sessions/modifier', [
            'session' => $session, 'formation_session' => $formation_session, 'prof_session' => $prof_session, 'profs' => $profs_formations,
            'liste_formations' => $listeFormations
        ]);
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
                'sessions.*', 'formations.titre as titre_formation', 'formations.photo as photo_formation', 'profs.nom as nom_prof', 'profs.prenom as prenom_prof', 'profs.photo as photo_prof', 'profs.tel as tel_prof', 'profs.email as email_prof', 'profs.sexe as sexe_prof'
            ]);

        $etudiants = Etudiant::where('session_id', $id)->get();


        // return response()->json($session);
        return view('admin.sessions.voir', ['session' => $session, 'etudiants' => $etudiants]);
    }

    // ------------------------------------------------------------------------------------------------------------------------------
    // les funcion pou statut 
    public function demmarer_session($id)
    {
        $session = Session::find($id);
        $session->statut = 'En cours';
        $start_date = Carbon::today();
        $session->date_debut = $start_date;
        $session->save();

        $etudiants = Etudiant::where('session_id', $id)
            ->whereNotIn('etat_formation', ['Exclu'])
            ->update(['date_debut_formation' => $start_date]);


        $nom = $session->nom;
        Alert::success('Marquage de démmarage de la session ', $nom);
        return redirect('/admin/session/voir/' . $id);
    }


    public function arreter_session($id)
    {
        $session = Session::find($id);
        $session->statut = 'Terminée';
        $stop_date = Carbon::today();
        $session->date_fin = $stop_date;
        $session->save();
        // -------------------------------------
        $date_diplome = $stop_date->addDays(1);
        $fin_date = Carbon::today();
        $debut_date = $session->date_debut;
        // modifier formation pour etudiants
        $etudiants = Etudiant::where('session_id', $id)->update(['date_debut_formation' => $debut_date]);
        $etudiants = Etudiant::where('session_id', $id)->whereNotIn('etat_formation', ['Exclu'])->update(['date_fin_formation' => $fin_date]);

        $etudiants = Etudiant::where('session_id', $id)->update(['etat_formation' => 'fin-de-la-formation']);
        // modifier diplome pour etudiants
        $etudiants = Etudiant::where('session_id', $id)->whereNotIn('etat_formation', ['Exclu'])->update(['date_obt_diplome' => $date_diplome]);

        $etudiants = Etudiant::where('session_id', $id)->whereNotIn('etat_formation', ['Exclu'])->update(['mention_diplome' => 'Excellent']);

        // -------------------------------------
        $etudiants = Etudiant::leftJoin('sessions', function ($join_sessions) {
            $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
        })
            ->where('sessions.id', $id)
            ->whereNotIn('etat_formation', ['Exclu'])
            ->get([
                'etudiants.*', 'sessions.nom as session', 'sessions.id as idsession', 'sessions.formation_id as idformation',
            ]);

        foreach ($etudiants as $etudiant) {
            $id_etudiant = $etudiant->id;
            $id_session = $etudiant->idsession;
            $id_formation = $etudiant->idformation;

            $annee = Carbon::today()->year;

            // Construction du code du diplôme
            $code = 'E' . $id_etudiant . 'S' . $id_session . 'F' . $id_formation . 'A' . $annee;

            // Mise à jour de l'étudiant avec le code de diplôme
            Etudiant::where('id', $id_etudiant)->update(['code_diplome' => $code]);
        }

        $nom = $session->nom;
        Alert::success('Marquage de la fin de la session ' . $nom, ' les diplômes sont prêts pour le téléchargement');
        return redirect('/admin/session/voir/' . $id);
    }


    public function prolonger_session($id)
    {
        $session = Session::find($id);
        $session->statut = 'Prolongée';
        $session->date_fin = null;
        $session->save();
        // -------------------------------------
        $etudiants = Etudiant::leftJoin('sessions', function ($join_sessions) {
            $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
        })
            ->where('sessions.id', $id)
            ->whereNotIn('etat_formation', ['Exclu'])
            ->get([
                'etudiants.*', 'sessions.nom as session', 'sessions.id as idsession', 'sessions.formation_id as idformation',
            ]);

        foreach ($etudiants as $etudiant) {
            $id_etudiant = $etudiant->id;
            Etudiant::where('id', $id_etudiant)->update(['etat_formation' => 'En-formation']);
            Etudiant::where('id', $id_etudiant)->update(['code_diplome' => null]);
            Etudiant::where('id', $id_etudiant)->update(['mention_diplome' => null]);
            Etudiant::where('id', $id_etudiant)->update(['date_obt_diplome' => null]);
            Etudiant::where('id', $id_etudiant)->update(['date_fin_formation' => null]);
        }

        $nom = $session->nom;
        Alert::success('Prolongation de la durée de la session ', $nom);
        return redirect('/admin/session/voir/' . $id);
    }
    // ------------------------------------------------------------------------------------------------------------------------------


    public function getProfs($id_formation)
    {
        try {

            // Récupérez les professeurs en fonction du titre de la formation
            $cours = Cour::leftJoin('profs', function ($join_profs) {
                $join_profs->on('cours.prof_id', '=', 'profs.id');
            })
                ->where('formation_id', $id_formation)->get([
                    'cours.*', 'profs.*', 'profs.id as id_prof',
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


    public function delete_etudiant($id_session, $id_etudiant)
    {
        $etudiant = Etudiant::find($id_etudiant);
        $nom = $etudiant->nom;
        $prenom = $etudiant->prenom;
        $etudiant->etat_formation = 'Exclu';
        $etudiant->save();

        Alert::error($nom . ' ' . $prenom, ' est exclu de la session ')->timerProgressBar(500);
        return redirect('/admin/session/voir/' . $id_session);
    }

    public function reprendre_etudiant($id_session, $id_etudiant)
    {
        $etudiant = Etudiant::find($id_etudiant);
        $nom = $etudiant->nom;
        $prenom = $etudiant->prenom;
        $etudiant->etat_formation = 'En-formation';
        $etudiant->save();

        Alert::success($nom . ' ' . $prenom, ' a repris cours dans cette session ')->timerProgressBar(500);
        return redirect('/admin/session/voir/' . $id_session);
    }




    // ---------------------------------------------------------------------------------------------------
    public function certificat_etudiant($id_session, $id_etudiant)
    {
        $etudiant = Etudiant::leftJoin('sessions', function ($join_sessions) {
            $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
        })
            ->leftJoin('formations', function ($join_formations) {
                $join_formations->on('sessions.formation_id', '=', 'formations.id');
            })
            ->where('etudiants.id', $id_etudiant)
            ->first([
                'etudiants.*', 'sessions.nom as session', 'formations.titre as formation',
            ]);

        $informations = Information::all()->first();
        $telephones = Telephone::all();

        $sexe = $etudiant->sexe;
        if ($sexe == 'H') {
            $sexe = 'Mr';
        }
        if ($sexe == 'F') {
            $sexe = 'Mme';
        }
        $nom = $etudiant->nom;
        $prenom = $etudiant->prenom;
        $date_naissance = $etudiant->date_naissance;
        $lieu_naissance = $etudiant->lieu_naissance;
        $formation = $etudiant->formation;
        $date_debut = $etudiant->date_debut_formation;
        $date_fin = $etudiant->date_fin_formation;
        $date_diplome = $etudiant->date_obt_diplome;
        $mention_diplome = $etudiant->mention_diplome;
        $code_diplome = $etudiant->code_diplome;
        $date = Carbon::today();
        $date = $date->toDateString();
        $wilaya = $informations->wilaya;
        $titre = $etudiant->nom . '_' . $etudiant->prenom;
        $backgroundImage = public_path('/certificats/certificat.jpg');
        $poppins = public_path('/fonts/font-poppins/Poppins-Regular.ttf');
        $poppins_bold = public_path('/fonts/font-poppins/Poppins-Bold.ttf');
        $greatvibes = public_path('/fonts/great-vibes/GreatVibes-Regular.ttf');
 


        $data = [
            'sexe' => $sexe,
            'nom' => $nom,
            'prenom' => $prenom,

            'date_naissance' => $date_naissance,
            'lieu_naissance' => $lieu_naissance,

            'code' => $code_diplome,
            'formation' => $formation,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'date_obt' => $date_diplome,
            'mention' => $mention_diplome,


            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            'wilaya' => $wilaya,
            'background' => $backgroundImage,
            'poppins' => $poppins,
            'poppins_bold' => $poppins_bold,
            'greatvibes' => $greatvibes,


            // ... Autres données ...
        ];

        // $pdf = PDF::loadView('pdf',$data, compact('informations') );
        $pdf = PDF::loadView('admin.sessions.diplome', $data)->setPaper('A4', 'landscape');


        // Générer le PDF à partir d'une vue
        return $pdf->download('Diplôme_Stagiaire_' . $titre . '.pdf');



        Alert::success('Le certificat pour: ' . $titre, ' à été téléchargé avec succès');
        return redirect('/admin/session/voir/' . $id_session);
    }


    // public function certificats_session($id_session)
    // {
    //     $etudiants = Etudiant::leftJoin('sessions', function ($join_sessions) {
    //         $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
    //     })
    //         ->leftJoin('formations', function ($join_formations) {
    //             $join_formations->on('sessions.formation_id', '=', 'formations.id');
    //         })
    //         ->where('sessions.id', $id_session)
    //         ->whereNotIn('etudiants.etat_formation', ['Exclu'])
    //         ->get([
    //             'etudiants.*', 'sessions.nom as session', 'formations.titre as formation',
    //         ]);



    //         foreach ($etudiants as $etudiant) {
    //             $informations = Information::all()->first();
    //             $telephones = Telephone::all();

    //             $sexe = $etudiant->sexe;
    //             if ($sexe == 'H') {
    //                 $sexe = 'Mr';
    //             }
    //             if ($sexe == 'F') {
    //                 $sexe = 'Mme';
    //             }
    //             $nom = $etudiant->nom;
    //             $prenom = $etudiant->prenom;
    //             $date_naissance = $etudiant->date_naissance;
    //             $lieu_naissance = $etudiant->lieu_naissance;
    //             $formation = $etudiant->formation;
    //             $session = $etudiant->session;
    //             $date_debut =$etudiant->date_debut_formation;
    //             $date_fin =$etudiant->date_fin_formation;
    //             $date_diplome =$etudiant->date_obt_diplome;
    //             $mention_diplome =$etudiant->mention_diplome;
    //             $code_diplome = $etudiant->code_diplome;
    //             $date = Carbon::today();
    //             $date = $date->toDateString();
    //             $wilaya = $informations->wilaya;

    //             $data = [
    //                 'sexe' => $sexe,
    //                 'nom' => $nom,
    //                 'prenom' => $prenom,

    //                 'date_naissance' => $date_naissance,
    //                 'lieu_naissance' => $lieu_naissance,

    //                 'code' => $code_diplome,
    //                 'formation' => $formation,
    //                 'date_debut' => $date_debut,
    //                 'date_fin' => $date_fin,
    //                 'date_obt' => $date_diplome,
    //                 'mention' => $mention_diplome,


    //                 'informations' => $informations,
    //                 'telephones' => $telephones,
    //                 'date' => $date,
    //                 'wilaya' => $wilaya,

    //             ];


    //             $pdf = PDF::loadView('admin.sessions.diplome', $data)->setPaper('legal', 'landscape');

    //             $titre = $etudiant->nom . '_' . $etudiant->prenom;

    //             return $pdf->download('Diplôme_Stagiaire_' . $titre . '.pdf');
    //         }

    //         Alert::success('Les certificats pour la session ont été téléchargés avec succès');
    //         return redirect('/admin/session/voir/' . $id_session);
    // }


    public function certificats_session($id_session)
    {
        $etudiants = Etudiant::leftJoin('sessions', function ($join_sessions) {
            $join_sessions->on('etudiants.session_id', '=', 'sessions.id');
        })
            ->leftJoin('formations', function ($join_formations) {
                $join_formations->on('sessions.formation_id', '=', 'formations.id');
            })
            ->where('sessions.id', $id_session)
            ->whereNotIn('etudiants.etat_formation', ['Exclu'])
            ->get([
                'etudiants.*', 'sessions.nom as session', 'formations.titre as formation',
            ]);

        $session = Session::find($id_session);
        $nomSession = str_replace(' ', '_', $session->nom); // Remplace les espaces par des underscores

        // Répertoire parent
        $dossierParent = public_path("certificats");

        // Créez le dossier parent s'il n'existe pas
        if (!is_dir($dossierParent)) {
            mkdir($dossierParent, 0755, true);
        }

        // Créez le dossier pour les certificats si nécessaire
        $dossierCertificats = "{$dossierParent}/{$nomSession}";

        if (!is_dir($dossierCertificats)) {
            mkdir($dossierCertificats, 0755, true);
        }

        $informations = Information::all()->first();
        $telephones = Telephone::all();

        foreach ($etudiants as $etudiant) {

            $sexe = $etudiant->sexe;
            if ($sexe == 'H') {
                $sexe = 'Mr';
            }
            if ($sexe == 'F') {
                $sexe = 'Mme';
            }
            $nom = $etudiant->nom;
            $prenom = $etudiant->prenom;
            $date_naissance = $etudiant->date_naissance;
            $lieu_naissance = $etudiant->lieu_naissance;
            $formation = $etudiant->formation;
            $session = $etudiant->session;
            $date_debut = $etudiant->date_debut_formation;
            $date_fin = $etudiant->date_fin_formation;
            $date_diplome = $etudiant->date_obt_diplome;
            $mention_diplome = $etudiant->mention_diplome;
            $code_diplome = $etudiant->code_diplome;
            $date = Carbon::today();
            $date = $date->toDateString();
            $wilaya = $informations->wilaya;
            $titre = $etudiant->nom . '_' . $etudiant->prenom;
            $backgroundImage = public_path('/certificats/certificat.jpg');
            $poppins = public_path('/fonts/font-poppins/Poppins-Regular.ttf');
            $poppins_bold = public_path('/fonts/font-poppins/Poppins-Bold.ttf');
            $greatvibes = public_path('/fonts/great-vibes/GreatVibes-Regular.ttf');

            $data = [
                'sexe' => $sexe,
                'nom' => $nom,
                'prenom' => $prenom,

                'date_naissance' => $date_naissance,
                'lieu_naissance' => $lieu_naissance,

                'code' => $code_diplome,
                'formation' => $formation,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'date_obt' => $date_diplome,
                'mention' => $mention_diplome,


                'informations' => $informations,
                'telephones' => $telephones,
                'date' => $date,
                'wilaya' => $wilaya,
                'background' => $backgroundImage,
                'poppins' => $poppins,
                'poppins_bold' => $poppins_bold,
                'greatvibes' => $greatvibes,

                // ... Autres données ...
            ];

            $pdf = PDF::loadView('admin.sessions.diplome', $data)->setPaper('A4', 'landscape');

            // Enregistrez le PDF dans le dossier des certificats
            $pdf->save("certificats/{$nomSession}/Diplôme_Stagiaire_{$titre}.pdf");
        }

        // Zippez les certificats
        $zipFileName = "certificats_{$nomSession}.zip";
        $zipFilePath = public_path($zipFileName);
        $zip = new \ZipArchive;
        $zip->open($zipFilePath, \ZipArchive::CREATE);

        $files = File::allFiles($dossierCertificats);

        foreach ($files as $file) {
            $zip->addFile($file->getPathname(), $file->getBasename());
        }

        $zip->close();

        // Supprimez le dossier des certificats maintenant que tout est dans le fichier ZIP
        File::deleteDirectory($dossierCertificats);

        // Retournez le fichier ZIP
        return response()->download($zipFilePath)->deleteFileAfterSend();
    }
}
