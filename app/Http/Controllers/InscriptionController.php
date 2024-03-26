<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Session;
use App\Models\Information;
use App\Models\Telephone;
use App\Models\TypePaiement;
use App\Http\Requests\InscriptionRequest;
use App\Http\Requests\EtudiantRequest;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Date;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class InscriptionController extends Controller
{
    public $ListeInscriptions;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ListeInscriptions = Inscription::rightJoin('formations', 'inscriptions.formation_id', '=', 'formations.id')
            ->where('inscriptions.validation', false)
            ->orderBy('inscriptions.id', 'DESC')
            ->get([
                'inscriptions.*', // Sélectionne toutes les colonnes de la table inscriptions
                'formations.titre as formation', // Renomme la colonne 'nom_formation' en 'formation_nom'
            ]);

        return view('admin.inscriptions.liste', ['inscriptions' => $ListeInscriptions]);
    }



    public function create()
    {
        $ListeFormations = Formation::all();
        return view('admin.inscriptions.ajouter', ['formations' => $ListeFormations]);
    }




    public function telecharger_pdf_inscription($id)
    {
        $inscription = Inscription::rightJoin('formations', 'inscriptions.formation_id', '=', 'formations.id')
            ->where('inscriptions.id', $id)
            ->first([
                'inscriptions.*', // Sélectionne toutes les colonnes de la table inscriptions
                'formations.titre as formation', // Renomme la colonne 'nom_formation' en 'formation_nom'
            ]);
        $informations = Information::all()->first();
        $telephones = Telephone::all();

        $id_formation = $inscription->formation_id;
        $formation = Formation::find($id_formation);

        $data = [
            'sexe' => $inscription->sexe,
            'nom' => $inscription->nom,
            'prenom' => $inscription->prenom,
            'age' => $inscription->age,
            'wilaya' => $inscription->wilaya,
            'profession' => $inscription->profession,
            'tel' => $inscription->tel,
            'email' => $inscription->email,
            'formation' => $inscription->formation,
            'session' => $inscription->session,
            'montant' => $inscription->montant,
            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $inscription->created_at,
        ];

        $titre = $inscription->nom . '_' . $inscription->prenom;
        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('admin.inscriptions.pdf', $data);

        // Télécharger le PDF avec un nom spécifique
        return $pdf->download($titre . '.pdf');
    }





    public function store(InscriptionRequest $request)
    {
        // ... sauvegarder l'inscription
        $inscription = new Inscription();

        $inscription->sexe = $request->input('sexe');
        $inscription->nom = $request->input('nom');
        $inscription->prenom = $request->input('prenom');
        $inscription->age = $request->input('age');
        $inscription->wilaya = $request->input('wilaya');
        $inscription->profession = $request->input('profession');
        $inscription->tel = $request->input('tel');
        $inscription->email = $request->input('email');
        $inscription->formation_id = $request->input('formation');

        $inscription->save();

        // ... message de sweetalert2 
        $lenom = $request->input('nom');
        $leprenom = $request->input('prenom');
        $titre = $lenom . ' ' . $leprenom;

        Alert::success('Votre inscription sous le nom : ' . $titre . ' a bien été enregistrer ! Merci');


        // ... Validation des données et téléchargements de fichiers ...
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $date = date('d/m/20y');
        $id_formation = $inscription->formation_id;
        $formation = Formation::find($id_formation);

        $data = [
            'sexe' => $request->input('sexe'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'age' => $request->input('age'),
            'wilaya' => $request->input('wilaya'),
            'profession' => $request->input('profession'),
            'tel' => $request->input('tel'),
            'email' => $request->input('email'),
            'formation' => $formation->titre,
            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
        ];


        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('admin\inscriptions\pdf', $data);

        // Télécharger le PDF avec un nom spécifique
        return $pdf->download($titre . '.pdf');
    }




    public function show($id)
    {
        $inscription = Inscription::rightJoin('formations', 'inscriptions.formation_id', '=', 'formations.id')
            // ->where('inscriptions.validation', false)
            ->where('inscriptions.id', $id)
            ->first([
                'inscriptions.*', // Sélectionne toutes les colonnes de la table inscriptions
                'formations.titre as formation', // Renomme la colonne 'nom_formation' en 'formation_nom'
            ]);
        return view('admin/inscriptions/voir', ['inscription' => $inscription]);
    }







    public function edit($id)
    {
        // $inscription = Inscription::find($id);
        $inscription = Inscription::rightJoin('formations', 'inscriptions.formation_id', '=', 'formations.id')
            ->where('inscriptions.validation', false)
            ->where('inscriptions.id', $id)
            ->first([
                'inscriptions.*', // Sélectionne toutes les colonnes de la table inscriptions
                'formations.titre as formation', // Renomme la colonne 'nom_formation' en 'formation_nom'
            ]);
        $formations = Formation::all();
        return view('admin/inscriptions/modifier', ['inscription' => $inscription, 'formations' => $formations]);
    }



    //    |---------------------------------------------------|    
    //    |-------------validation d'inscription--------------|
    //    |---------------------------------------------------|
    public function validepage($id)
    {
        $inscription = Inscription::find($id);

        $formation_choisie = $inscription->formation_id;


        $formation_etudiant = Formation::find($formation_choisie);

        $formations = Formation::all();

        return view('admin/inscriptions/valid', ['inscription' => $inscription, 'formation_etudiant' => $formation_etudiant, 'formations' => $formations]);
    }

    public function validesave(EtudiantRequest $request, $id)
    {
        $etudiant = new Etudiant();
        $inscription = Inscription::find($id);

        // modification de la table inscriptions 
        $inscription->validation = (true);


// ajouter l'etudiant sur la table etudiant et  save 
        
        $inscription->save();

        $id_paiement = $request->input('tarif');

        $paiement = TypePaiement::find($id_paiement);
        $tarif = $paiement->titre;
        $prix = $paiement->prix;


        // enregistrement de l'etudiant dans la table etudiants
        $etudiant->nom =  $request->input('nom');
        $etudiant->prenom =  $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->wilaya =  $request->input('wilaya');
        $etudiant->adresse =  $request->input('adresse');
        $etudiant->date_naissance =  $request->input('date_naissance');
        $etudiant->lieu_naissance =  $request->input('lieu_naissance');
        $etudiant->tel =  $request->input('tel');
        $etudiant->email =  $request->input('email');
        $etudiant->profession = $request->input('profession');
        $etudiant->session_id = $request->input('session');

        $etudiant->id_tarif = $request->input('tarif');
        $etudiant->tarif = $tarif;
        $etudiant->prix_formation = $prix;

        if ($request->hasFile('photo')) {
            // dd('OK===>>>Message de débogage : Image chargée') ;
            $etudiant->photo = $request->photo->store('/public/images/stagiaires');
        }else{
            // dd('X===>>>Message de débogage : Image pas chargée') ;
        }

        $etudiant->save();


        $lenom = $etudiant->nom;
        $leprenom = $etudiant->prenom;

        Alert::success('le stagiaire : ' . $lenom . ' ' . $leprenom . ' a bien été validé');



        // telechargemnt de ficher pdf
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        //         
        $formationchoi = $inscription->formation_id;
        $formation = Formation::find($formationchoi);
        $sessionchoi = $etudiant->session_id;
        $session = Session::find($sessionchoi);
        $session_nom = $session->nom;
        
        $date = date('d/m/20y');
        $sexe = ($etudiant->sexe == 'H') ? 'Homme' : 'Femme';


        $data = [

            'sexe' => $sexe,
            'nom' => $etudiant->nom,
            'prenom' => $etudiant->prenom,
            'age' => $inscription->age,
            'date_naissance' => $etudiant->date_naissance,
            'lieu_naissance' => $etudiant->lieu_naissance,

            'wilaya' => $etudiant->wilaya,
            'profession' => $etudiant->profession,
            'tel' => $etudiant->tel,
            'email' => $etudiant->email,

            'formation' => $formation->titre,
            'session' => $session_nom,
            'montant' => $etudiant->montant,
            'photo' => $etudiant->photo,

            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            // ... Autres données ...
        ];

        // $pdf = PDF::loadView('pdf',$data, compact('informations') );
        $pdf = PDF::loadView('admin.inscriptions.pdf_recu', $data);

        $titre = $etudiant->nom . '_' . $etudiant->prenom;
        // Générer le PDF à partir d'une vue
        return $pdf->download($titre . '.pdf');
    }


    public function update(Request $request, $id)
    {

        $inscription = Inscription::find($id);

        $inscription->sexe = $request->input('sexe');
        $inscription->nom = $request->input('nom');
        $inscription->prenom = $request->input('prenom');
        $inscription->age = $request->input('age');
        $inscription->wilaya = $request->input('wilaya');
        $inscription->profession = $request->input('profession');
        $inscription->tel = $request->input('tel');
        $inscription->email = $request->input('email');
        $inscription->formation_id = $request->input('formation');

        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;

        $inscription->save();
        Alert::success('Votre inscription de : ' . $lenom . ' ' . $leprenom . ' a bien été modifiée');
        return redirect('/admin/inscriptions');
    }

    //    |---------------------------------------------------|    
    //    |------ operation sur la page voir de session-------|
    //    |---------------------------------------------------|
    public function sup_ins_sesion($id)
    {
        $inscription = Inscription::find($id);
        $sessionname = $inscription->session;
        $session = Session::where('nom', $sessionname)->first();



        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;

        $inscription->delete();
        Alert::success('le candidat ' . $lenom . ' ' . $leprenom . ' a été supprimé de la session ' . $sessionname);
        return redirect('/admin/session/' . $session->id . '/voir');
    }



    //    |---------------------------------------------------|    
    //    |------ imprimer un deplome pour un seul condidat---|
    //    |---------------------------------------------------|
    public function imprime1($id)
    {

        $inscription = Inscription::find($id);

        $date = date('d/m/20y');

        $sessionname = $inscription->session;
        $session = Session::where('nom', $sessionname)->first();
        // $deb = $session->date_debut;
        $deb = $date;
        $fin = $date;

        // telechargemnt de ficher pdf
        $informations = Information::all()->first();
        $telephones = Telephone::all()->first();



        $data = [
            'sexe' => $inscription->sexe,
            'nom' => $inscription->nom,
            'prenom' => $inscription->prenom,


            'formation' => $inscription->formation,
            'date_deb' => $deb,
            'date_fin' => $fin,


            'informations' => $informations,
            'telephones' => $telephones,
            'date' => $date,
            // ... Autres données ...
        ];

        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;
        $formationname = $inscription->formation;

        // $pdf = PDF::loadView('pdf',$data, compact('informations') );


        Alert::success('Diplôme de : ' . $sessionname . ' pour le candidat : ' . $lenom . ' ' . $leprenom . ' a bien été télécharger');
        $pdf = PDF::loadView('admin\sessions\deplome1pdf', $data);
        $pdf->setPaper('A4', 'landscape'); // Définissez le format du papier en paysage (landscape)
        $pdfOutput = $pdf->output();

        // Générer le PDF et définir l'entête de la réponse
        $response = Response::make($pdfOutput, 200, [
            'Content-Type' => 'application/pdf',
            // 'Content-Disposition' => 'inline;filename="'.$lenom.'_'.$leprenom.'_attistation_'.$formationname.'_'.$date.'.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
            'Content-Disposition' => 'attachment; filename="' . $lenom . '_' . $leprenom . '_attistation_' . $formationname . '_' . $date . '.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
            'Content-Length' => strlen($pdfOutput),

        ]);


        return $response;

        // return redirect()->back();


        // Rediriger vers la même URL (rafraîchir la page)

        // return redirect('/admin/inscriptions');
    }

                        //    |---------------------------------------------------|    
                        //    |------ imprimer un deplome pour touts condidat---|
                        //    |---------------------------------------------------|
                        public function imprimer_tout($id)
                        {
                            $session = Session::find($id);
                            $sessionname = $session->nom;
                            $date = date('d/m/20y');
                            $inscriptions = Inscription::where('session', $sessionname)->get();
                            $informations = Information::all()->first();
                            $telephones = Telephone::all()->first();
                        
                            // Créez un objet Dompdf
                            $pdf = new \Dompdf\Dompdf();
                            $pdf->setPaper('A4', 'landscape');
                            
                            // Créez une variable pour stocker le contenu HTML de toutes les pages
                            $allHtmlPages = '';
                        
                            foreach ($inscriptions as $inscription) {
                                $data = [
                                    'sexe' => $inscription->sexe,
                                    'nom' => $inscription->nom,
                                    'prenom' => $inscription->prenom,
                                    'formation' => $inscription->formation,
                                    'date_deb' => $date,
                                    'date_fin' => $date,
                                    'informations' => $informations,
                                    'telephones' => $telephones,
                                    'date' => $date,
                                ];
                        
                                // Générez le diplôme individuel
                                $htmlPage = view('admin\sessions\deplome1pdf', $data);
                        
                                // Ajoutez le contenu HTML de la page actuelle à la variable
                                $allHtmlPages .= $htmlPage;
                            }
                        
                            // Chargez toutes les pages HTML dans Dompdf
                            $pdf->loadHtml($allHtmlPages);
                        
                            // Rendez les pages disponibles pour la génération PDF
                            $pdf->render();
                        
                            // Renvoyez le PDF final au navigateur en tant que téléchargement
                            $pdfOutput = $pdf->output();
                            $response = Response::make($pdfOutput, 200, [
                                'Content-Type' => 'application/pdf',
                                'Content-Disposition' => 'attachment; filename="tous_les_diplomes.pdf"',
                                'Content-Length' => strlen($pdfOutput),
                            ]);
                        
                            Alert::success('Les diplômes pour la session : ' . $sessionname . ' ont été téléchargés avec succès.');
                            return $response;
                        }
                        
                        
















    public function destroy($id)
    {
        $inscription = Inscription::find($id);
        $inscription->delete();
        return redirect('/admin/inscriptions');
    }











}
