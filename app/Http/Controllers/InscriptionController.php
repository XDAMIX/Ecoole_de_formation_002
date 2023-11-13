<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formation;
use App\Models\Session;
use App\Models\Information;
use App\Models\Telephone;
use App\Http\Requests\InscriptionRequest;
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

    public function index() {
        $ListeFormations = Formation::all();
        // $ListeInscriptions = Inscription::orderBy('id', 'DESC')->get(); 
        $ListeInscriptions = Inscription::all(); 
       
        $formation = '';
        $contact = '';
        $dateDebut = '';
        $dateFin = '';
        $valeur = '';

        $chformation = 0;
        $chdate = 0;
        $chcontact = 0;



        // return view('admin.inscriptions.index',['inscriptions'=>$ListeInscriptions,'formations'=>$ListeFormations,'valeur'=>$valeur
        //                                     ,'laformation'=>$formation,'lecontact'=>$contact,'ladatedebut'=>$dateDebut,'ladatefin'=>$dateFin
        //                                     ,'chformation'=>$chformation,'chdate'=>$chdate,'chcontact'=>$chcontact]);


        return view('admin.inscriptions.liste',['inscriptions'=>$ListeInscriptions]);


    }




    public function imprimertout() {
        $ListeInscriptions = Inscription::orderBy('id', 'desc')->get();

        $html = View::make('admin.inscriptions.imprimertout', ['inscriptions'=> $ListeInscriptions])->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('inscriptions.pdf');
        
    }

    public function create() {
        $ListeFormations = Formation::all();
        return view('admin.inscriptions.ajouter',['formations'=>$ListeFormations]);
    }

    public function store(InscriptionRequest $request) {
            // $request->validate([
               
            //     'nom'=>'required|max:40|string',
            //     'age'=>'required|max:20|number',
                
            //     'tel'=>'required|max:20|number'
            // ]);
        $inscription = new Inscription();

        $inscription->sexe = $request->input('sexe');
        $inscription->nom = $request->input('nom');
        $inscription->prenom = $request->input('prenom');
        $inscription->age = $request->input('age');
        $inscription->wilaya = $request->input('wilaya');
        $inscription->profession = $request->input('profession');
        $inscription->tel = $request->input('tel');
        $inscription->email = $request->input('email');
        $inscription->formation = $request->input('formation');
        // $inscription->date = now();

        $inscription->save();


        $lenom = $request->input('nom');
        $leprenom = $request->input('prenom');

        $titre = $lenom.' '.$leprenom;
        
        Alert::success('Votre inscription sous le nom : '.$titre.' a bien été enregistrer !, Merci');
// ... Validation des données et téléchargements de fichiers ...

$data = [
    'sexe' => $request->input('sexe'),
    'nom' => $request->input('nom'),
    'prenom' => $request->input('prenom'),
    'age' => $request->input('age'),
    'wilaya' => $request->input('wilaya'),
    'profession' => $request->input('profession'),
    'tel' => $request->input('tel'),
    'email' => $request->input('email'),
    'formation' => $request->input('formation'),
   
];


$pdf = PDF::loadView('pdf', $data);
return $pdf->stream('pdf');

// return redirect('/admin/inscriptions');

    }
  







    public function edit($id) {
        $inscription =Inscription::find($id);
        $formations = Formation::all();
        return view('admin/inscriptions/modifier',['inscription'=>$inscription,'formations'=>$formations]);

        
    }
                        //    |---------------------------------------------------|    
                        //    |-------------validation d'inscription--------------|
                        //    |---------------------------------------------------|
    public function validepage($id) {
        $inscription =Inscription::find($id);

        $formationchoi = $inscription->formation;
        // $sessions = Session::where('formation',$formationchoi)->get();
        $sessions = Session::where('formation',$formationchoi)->where('statut','En attente')->get();
        
        $formations = Formation::all();
        return view('admin/inscriptions/valid',['inscription'=>$inscription,'sessions'=>$sessions,'formations'=>$formations]);

        
    }

    public function validesave(Request $request,$id) {

        $inscription = Inscription::find($id);

        $inscription->session = $request->input('session');
        $inscription->contact = (true);
        
        $inscription->montant= $request->input('montant');


        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;

// ajouter l'etudiant sur la table etudiant et  save 
        
        $inscription->save();
        Alert::success('le candidat '.$lenom.' '. $leprenom .' a bien été inscrtie');


                     // telechargemnt de ficher pd e
        $informations= Information::all()->first();
        $telephones = Telephone::all()->first();
        
        $date=date('d/m/20y');
        
        $data = [
            'sexe' => $request->input('sexe'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'age' => $request->input('age'),
            'wilaya' => $request->input('wilaya'),
            'profession' => $request->input('profession'),
            'tel' => $request->input('tel'),
            'email' => $request->input('email'),

            'formation' => $inscription->formation,
            'session' => $request->input('session'),
            'montant' => $request->input('montant'),


            'informations' => $informations,
            'telephones' => $telephones ,
            'date'=>$date,
            // ... Autres données ...
        ];

// $pdf = PDF::loadView('pdf',$data, compact('informations') );
$pdf = PDF::loadView('admin\inscriptions\pdf_recu',$data);

$pdfOutput = $pdf->output();

  // Générer le PDF et définir l'entête de la réponse
  $response = Response::make($pdfOutput, 200, [
    'Content-Type' => 'application/pdf',
    // 'Content-Disposition' => 'inline;filename="'.$lenom.'_'.$leprenom.'_rece_de_payement_'.$date.'.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
    'Content-Disposition' => 'attachment; filename="'.$lenom.'_'.$leprenom.'_rece_de_payementè'.$date.'.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
    'Content-Length' => strlen($pdfOutput),
    
]);
        return $response;
        // return redirect('/admin/inscriptions');
    }
    

    public function update(Request $request,$id) {

        $inscription = Inscription::find($id);

        $inscription->sexe = $request->input('sexe');
        $inscription->nom = $request->input('nom');
        $inscription->prenom = $request->input('prenom');
        $inscription->age = $request->input('age');
        $inscription->wilaya = $request->input('wilaya');
        $inscription->profession = $request->input('profession');
        $inscription->tel = $request->input('tel');
        $inscription->email = $request->input('email');
        $inscription->formation = $request->input('formation');
  
        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;

        $inscription->save();
        Alert::success('Votre inscription de : '.$lenom.' '. $leprenom .' a bien été modifiée');
        return redirect('/admin/inscriptions');

    }

                        //    |---------------------------------------------------|    
                        //    |------ operation sur la page voir de session-------|
                        //    |---------------------------------------------------|
    public function sup_ins_sesion ($id){
        $inscription = Inscription::find($id);
        $sessionname = $inscription->session;
        $session = Session::where('nom',$sessionname)->first();
        
        

        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;

        $inscription->delete();
        Alert::success('le candidat '.$lenom.' '. $leprenom .' a été supprimé de la session '.$sessionname);
        return redirect('/admin/session/'.$session->id.'/voir');

    }



                        //    |---------------------------------------------------|    
                        //    |------ imprimer un deplome pour un seul condidat---|
                        //    |---------------------------------------------------|
    public function imprime1 ($id) {

        $inscription = Inscription::find($id);

        $date=date('d/m/20y');

        $sessionname = $inscription->session;
        $session = Session::where('nom',$sessionname)->first();
        // $deb = $session->date_debut;
        $deb = $date;
        $fin = $date;

                     // telechargemnt de ficher pdf
        $informations= Information::all()->first();
        $telephones = Telephone::all()->first();
        
        
        
        $data = [
            'sexe' => $inscription->sexe,
            'nom' => $inscription->nom,
            'prenom' => $inscription->prenom,
          

            'formation' => $inscription->formation,
            'date_deb' => $deb,
            'date_fin' => $fin,


            'informations' => $informations,
            'telephones' => $telephones ,
            'date'=>$date,
            // ... Autres données ...
        ];

        $lenom = $inscription->nom;
        $leprenom = $inscription->prenom;
        $formationname = $inscription->formation; 

// $pdf = PDF::loadView('pdf',$data, compact('informations') );


Alert::success('Diplôme de : '.$sessionname.' pour le candidat : '.$lenom.' '. $leprenom .' a bien été télécharger');
$pdf = PDF::loadView('admin\sessions\deplome1pdf',$data);
$pdf->setPaper('A4', 'landscape'); // Définissez le format du papier en paysage (landscape)
$pdfOutput = $pdf->output();

  // Générer le PDF et définir l'entête de la réponse
  $response = Response::make($pdfOutput, 200, [
    'Content-Type' => 'application/pdf',
    // 'Content-Disposition' => 'inline;filename="'.$lenom.'_'.$leprenom.'_attistation_'.$formationname.'_'.$date.'.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
    'Content-Disposition' => 'attachment; filename="'.$lenom.'_'.$leprenom.'_attistation_'.$formationname.'_'.$date.'.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
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
                        // public function imprimer_tout($id)
                        // {
                        //     $session = Session::find($id);
                        //     $sessionname = $session->nom;
                        //     $date = date('d/m/20y');
                        //     $inscriptions = Inscription::where('session', $sessionname)->get();
                        //     $informations = Information::all()->first();
                        //     $telephones = Telephone::all()->first();
                        
                        //     // Créez un objet Dompdf
                        //     $pdf = new \Dompdf\Dompdf();
                        //     $pdf->setPaper('A4', 'landscape');
                            
                        //     // Créez une variable pour stocker le contenu HTML de toutes les pages
                        //     $allHtmlPages = '';
                        
                        //     foreach ($inscriptions as $inscription) {
                        //         $data = [
                        //             'sexe' => $inscription->sexe,
                        //             'nom' => $inscription->nom,
                        //             'prenom' => $inscription->prenom,
                        //             'formation' => $inscription->formation,
                        //             'date_deb' => $date,
                        //             'date_fin' => $date,
                        //             'informations' => $informations,
                        //             'telephones' => $telephones,
                        //             'date' => $date,
                        //         ];
                        
                        //         // Générez le diplôme individuel
                        //         $htmlPage = view('admin\sessions\deplome1pdf', $data);
                        
                        //         // Ajoutez le contenu HTML de la page actuelle à la variable
                        //         $allHtmlPages .= $htmlPage;
                        //     }
                        
                        //     // Chargez toutes les pages HTML dans Dompdf
                        //     $pdf->loadHtml($allHtmlPages);
                        
                        //     // Rendez les pages disponibles pour la génération PDF
                        //     $pdf->render();
                        
                        //     // Renvoyez le PDF final au navigateur en tant que téléchargement
                        //     $pdfOutput = $pdf->output();
                        //     $response = Response::make($pdfOutput, 200, [
                        //         'Content-Type' => 'application/pdf',
                        //         'Content-Disposition' => 'attachment; filename="tous_les_diplomes.pdf"',
                        //         'Content-Length' => strlen($pdfOutput),
                        //     ]);
                        
                        //     Alert::success('Les diplômes pour la session ' . $sessionname . ' ont été téléchargés avec succès.');
                        //     return $response;
                        // }
                        
                        //  new code 


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
                        
                            Alert::success('Les diplômes pour la session ' . $sessionname . ' ont été téléchargés avec succès.');
                            return $response;
                        }
                        
                        
















    public function destroy($id) {
        $inscription = Inscription::find($id);
        $inscription->delete();
        return redirect('/admin/inscriptions');
    }


    public function filtrer(Request $request) {
        $ListeFormations = Formation::all();
        $ListeInscriptions = Inscription::all();
        $formation = $request->input('formation');
        $contact = $request->input('contact');
        $dateDebut = $request->input('date1');
        $dateFin = $request->input('date2');

        $valeur = '';

        $from = $request->from;
        $to = $request->to;

        $chformation = 0;
        $chdate = 0;
        $chcontact = 0;
// filtre par formation
        if($request->input('checkformation'))
        {
            $ListeInscriptions = Inscription::all()->where('formation','=',$formation);
            $chformation = 1;
        }

// filtre par contact
        if($request->input('checkcontact'))
        {
            $ListeInscriptions = Inscription::all()->where('contact','=',$contact);
            $chcontact = 1;
        }

// filtre par dates
        if($request->input('checkdate'))
        {
            $ListeInscriptions = Inscription::whereBetween('date', [$from.$dateDebut,$to.$dateFin])->get();
            $chdate= 1;
        }

// filtre par formation et contact
        if($request->input('checkformation') && $request->input('checkcontact'))
        {
            // $ListeInscriptions = Inscription::all()->where('formation','=',$formation,'and','contact','=',$contact);
            $ListeInscriptions = Inscription::all()->where('formation','=',$formation)
                                                    ->where('contact','=',$contact);
            $chformation = 1;
            $chcontact = 1;
        }

// filtre par formation et dates
        if($request->input('checkformation') && $request->input('checkdate'))
        {
            $ListeInscriptions = Inscription::whereBetween('date', [$dateDebut,$dateFin])
                                            ->where('formation','=',$formation)
                                            ->get();
            $chformation = 1;
            $chdate = 1;
        }

// filtre par contact et dates
        if($request->input('checkcontact') && $request->input('checkdate'))
        {
            $ListeInscriptions = Inscription::whereBetween('date', [$dateDebut,$dateFin])
                                            ->where('contact','=',$contact)
                                            ->get();
            $chcontact = 1;
            $chdate = 1;
        }

// filtre par contact et dates et formation
        if($request->input('checkcontact') && $request->input('checkdate') && $request->input('checkformation'))
        {
            $ListeInscriptions = Inscription::whereBetween('date', [$dateDebut,$dateFin])
                                            ->where('formation','=',$formation)
                                            ->where('contact','=',$contact)
                                            ->get();
            $chformation = 1;
            $chcontact = 1;
            $chdate = 1;
        }



    return view('admin.inscriptions.index',['inscriptions'=>$ListeInscriptions,'formations'=>$ListeFormations,'valeur'=>$valeur
                                            ,'laformation'=>$formation,'lecontact'=>$contact,'ladatedebut'=>$dateDebut,'ladatefin'=>$dateFin
                                            ,'chformation'=>$chformation,'chdate'=>$chdate,'chcontact'=>$chcontact]);



    }








    public function recherche(Request $request) {
        $ListeFormations = Formation::all();
        $ListeInscriptions = Inscription::all();
        $valeur = $request->input('valeur');

        $formation = '';
        $contact = '';
        $dateDebut = '';
        $dateFin = '';

        $chformation = 0;
        $chdate = 0;
        $chcontact = 0;

        $ListeInscriptions = Inscription::
                                        where('nom','like',"%$valeur%")
                                        ->get();
        return view('admin.inscriptions.index',['inscriptions'=>$ListeInscriptions,'formations'=>$ListeFormations,'valeur'=>$valeur
                                        ,'laformation'=>$formation,'lecontact'=>$contact,'ladatedebut'=>$dateDebut,'ladatefin'=>$dateFin
                                        ,'chformation'=>$chformation,'chdate'=>$chdate,'chcontact'=>$chcontact]);
    }

}
