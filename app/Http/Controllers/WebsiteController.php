<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acceuil;
use App\Models\Information;
use App\Models\Lien;
use App\Models\Telephone;
use App\Models\Paragraphe;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Message;
use App\Models\Photo;
use App\Models\Temoignage;
use App\Models\Banner;
use App\Models\Question;
use App\Http\Requests\InscriptionRequest;
use App\Http\Requests\MessageRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{






    public function readfromdatabase()
    {
        $ListeFormations = Formation::all();
        $ListePhotos = Photo::all();
        $ListeTem = Temoignage::all();
        $ListeBanners = Banner::all();
        $ListeQuestions = Question::all();
        $acceuil = Acceuil::all()->first();
        $informations = Information::all()->first();
        $liens = Lien::all();
        $telephones = Telephone::all();
        $paragraphes = Paragraphe::all();

        return view('index', [
            'formations' => $ListeFormations, 'photos' => $ListePhotos, 'temoignages' => $ListeTem, 'banners' => $ListeBanners,
            'questions' => $ListeQuestions, 'acceuil' => $acceuil, 'informations' => $informations, 'liens' => $liens, 'telephones' => $telephones,
            'paragraphes' => $paragraphes
        ]);
    }







    public function form_inscription()
    {
        $ListeFormations = Formation::all();
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();

        return view('inscription', ['formations' => $ListeFormations, 'informations' => $informations, 'telephones' => $telephones, 'liens' => $liens]);
    }







    public function form_inscription_parformation($id)
    {
        $LaFormation = formation::find($id);
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();

        return view('inscription_directe', ['formation' => $LaFormation, 'informations' => $informations, 'telephones' => $telephones, 'liens' => $liens]);
    }







    public function voir_formation($id)
    {
        $LaFormation = formation::find($id);
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();
        return view('voirplus', ['formation' => $LaFormation, 'informations' => $informations, 'telephones' => $telephones, 'liens' => $liens]);
    }







    public function save_inscription(InscriptionRequest $request)
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

        $lenom = $request->input('nom');
        $leprenom = $request->input('prenom');
        $titre = $lenom . ' ' . $leprenom;

        Alert::success($titre, 'Votre inscription en-ligne a été éffectuée avec succès! merci')->position('center')->autoClose(5000);


        // ... Validation des données et téléchargements de fichiers ...

        $informations = Information::all()->first();
        $telephones = Telephone::all();
        
        $id_formation = $inscription->formation_id;
        $formation = Formation::find($id_formation);

        $date = date('d/m/20y');

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
            // ... Autres données ...
        ];


        // Générer le PDF à partir d'une vue
        $pdf = PDF::loadView('pdf', $data);

        // Télécharger le PDF avec un nom spécifique
        return $pdf->download($titre . '.pdf');


    }







    public function send_the_message(MessageRequest $request)
    {
        $message = new Message();

        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->tel = $request->input('tel');
        $message->subject = $request->input('subject');
        $message->texte = $request->input('texte');

        $message->save();


        $titre = $request->input('name');

        Alert::success($titre, 'Votre message a été envoyé avec succès ! merci')->position('center')->autoClose(2000);

        return redirect('/');
    }



    //  PACCINO TESTE DOM-PDF

    public function teste_pdf()
    {
        $data = [
            'title' => 'teste de PDF avec DOMPDF',
            'content' => 'Contenu de mon PDF...'
        ];

        $pdf = PDF::loadView('template', $data);

        return $pdf->download('teste-pdf.pdf');
    }
}
