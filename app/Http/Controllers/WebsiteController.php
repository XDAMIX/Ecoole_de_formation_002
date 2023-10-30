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

        return view('index',['formations'=>$ListeFormations,'photos'=>$ListePhotos,'temoignages'=>$ListeTem,'banners'=>$ListeBanners,
        'questions'=>$ListeQuestions,'acceuil'=>$acceuil,'informations'=>$informations,'liens'=>$liens,'telephones'=>$telephones,
        'paragraphes'=>$paragraphes]);
    }

    public function form_inscription()
    {
        $ListeFormations = Formation::all();
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();

        return view('inscription',['formations'=>$ListeFormations,'informations'=>$informations,'telephones'=>$telephones,'liens'=>$liens]);
    }
    public function form_inscription_parformation($id)
    {
        $LaFormation = formation::find($id);
        $informations = Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();

        return view('inscription_directe',['formation'=>$LaFormation,'informations'=>$informations,'telephones'=>$telephones,'liens'=>$liens]);
    }

    public function voir_formation($id){
        $LaFormation = formation::find($id);
        $informations= Information::all()->first();
        $telephones = Telephone::all();
        $liens = Lien::all();
        return view('voirplus',['formation'=>$LaFormation,'informations'=>$informations,'telephones'=>$telephones,'liens'=>$liens]);
    }

    public function save_inscription(InscriptionRequest $request) {
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
        
        


        $lenom = $request->input('nom');
        $leprenom = $request->input('prenom');

        $inscription->save();
        $titre = $request->input('nom');
        Alert::success($titre, 'Inscription terminée avec success! merci')->position('center')->autoClose(7000);

// ... Validation des données et téléchargements de fichiers ...
        
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
    'formation' => $request->input('formation'),
    'informations' => $informations,
    'telephones' => $telephones ,
    'date'=>$date,
    // ... Autres données ...
];



// $pdf = PDF::loadView('pdf',$data, compact('informations') );
$pdf = PDF::loadView('pdf',$data);

$pdfOutput = $pdf->output();

  // Générer le PDF et définir l'entête de la réponse
  $response = Response::make($pdfOutput, 200, [
    'Content-Type' => 'application/pdf',
    // 'Content-Disposition' => 'inline; filename="registration.pdf"', // L'option "inline" indique au navigateur d'ouvrir le fichier PDF directement.
    'Content-Disposition' => 'attachment; filename="'.$lenom.'_'.$leprenom.'_inscription_formacorp.pdf"', // L'option "attachment" indique au navigateur de télécharger le fichier.
    'Content-Length' => strlen($pdfOutput),
    
]);

return $response;

    // Charger la vue avec JavaScript pour effectuer la redirection après un court délai
    // return View::make('redirect')->with('response', $response);

// Rediriger vers la racine après le téléchargement
// return $response->withHeaders([
//     'Refresh' => '3; url=/',
// ]);

// return $pdf->stream('pdf');
// return $pdf->download('pdf');

// return redirect('/');


        

    }
    public function send_the_message(MessageRequest $request) {
        $message = new Message();

        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->tel = $request->input('tel');
        $message->subject = $request->input('subject');
        $message->texte = $request->input('texte');

        $message->save();

        $titre = $request->input('name');
        Alert::success($titre , 'votre message a été envoyé avec success ! merci')->position('center')->autoClose(2000);

        return redirect('/');
     }
}
