<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;


class QuestionController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index() {
        $ListeQuestions = Question::all();
        return view('admin.faq.index',['questions'=>$ListeQuestions]);
    }

    public function create() {
        return view('admin.faq.ajouter');
    }

    public function store(QuestionRequest $request) {
        $nvQuestion = new Question();

        $nvQuestion->question = $request->input('question');
        $nvQuestion->reponse = $request->input('reponse');

        $nvQuestion->save();
        return redirect('/admin/faq');
    }

    public function edit($id) {
        $Question = Question::find($id);
        return view('admin.faq.modifier',['question' => $Question]);
    }

    public function update(QuestionRequest $request,$id) {
        $Question = Question::find($id);

        $Question->question = $request->input('question');
        $Question->reponse = $request->input('reponse');

        $Question->save();
        return redirect('/admin/faq');

    }

    public function destroy($id) {
        $Question = Question::find($id);
        $Question->delete();     
        return redirect('/admin/faq');
    }
}
