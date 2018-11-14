<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VocabularyController extends Controller
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

    public function index()
    {
        $vocabularies = Vocabulary::with('user')->latest()->get();
        return view('home', [
            'vocabularies' => $vocabularies
        ]);
    }

    public function create()
    {
        return view('vocabularies.create');
    }

    public function show()
    {
        return view('vocabularies.show');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'furigana' => 'required',
            'hiragana' => 'required',
            'romaji' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(route('vocabularies.create'))->withErrors($validator)->withInput();
        }
        $vocabulary = new Vocabulary();
        $inputs = $request->all();
        $vocabulary->user_id    = Auth::user()->id;
        $vocabulary->furigana   = $inputs['furigana'];
        $vocabulary->hiragana   = $inputs['hiragana'];
        $vocabulary->romaji     = $inputs['romaji'];
        $vocabulary->meaning_in_english = $inputs['meaningInEnglish'];
        $vocabulary->meaning_in_burmese = $inputs['meaningInBurmese'];
        $vocabulary->save();
        return redirect(route('vocabularies'));
    }

    public function edit($id)
    {
        $vocabulary = Vocabulary::find($id);
        return view('vocabularies.edit', compact('vocabulary'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'furigana' => 'required',
            'hiragana' => 'required',
            'romaji' => 'required',
        ]);
        $inputs = $request->all();

        $vocabulary = Vocabulary::find($id);
        $vocabulary->furigana = $inputs['furigana'];
        $vocabulary->hiragana = $inputs['hiragana'];
        $vocabulary->romaji = $inputs['romaji'];
        $vocabulary->meaning_in_english = $inputs['meaningInEnglish'];
        $vocabulary->meaning_in_burmese = $inputs['meaningInBurmese'];
        $vocabulary->save();

        return redirect('/vocabularies')->with('success', 'Vocabularies has been updated');
    }

    public function destroy($id)
    {

    }
}
