<?php

namespace App\Http\Controllers;

use App\Category;
use App\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VocabularyController extends Controller
{
    protected $rules = [
        'furigana'           => 'required',
        'hiragana'           => 'required',
        'romaji'             => 'required',
        'meaningInEnglish' => 'required',
        'meaningInBurmese' => 'required'
    ];

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
        $vocabularies = Vocabulary::all();
        return view('home', [
            'vocabularies' => $vocabularies
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('vocabularies.create', compact('categories'));
    }

    public function show()
    {
        return view('vocabularies.show');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return redirect(route('vocabularies.create'))->withErrors($validator)->withInput();
        }
        $vocabulary                     = new Vocabulary();
        $inputs                         = $request->all();
        $vocabulary->category_id        = $inputs['category'];
        $vocabulary->furigana           = $inputs['furigana'];
        $vocabulary->hiragana           = $inputs['hiragana'];
        $vocabulary->romaji             = $inputs['romaji'];
        $vocabulary->meaning_in_english = $inputs['meaningInEnglish'];
        $vocabulary->meaning_in_burmese = $inputs['meaningInBurmese'];
        $vocabulary->save();
        return redirect(route('vocabularies'));
    }

    public function edit($id)
    {
        $vocabulary = Vocabulary::find($id);
        $categories = Category::all();
        return view('vocabularies.edit', compact('vocabulary', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vocabulary                     = Vocabulary::find($id);
        $vocabulary->category_id        = $inputs['category'];
        $vocabulary->furigana           = $inputs['furigana'];
        $vocabulary->hiragana           = $inputs['hiragana'];
        $vocabulary->romaji             = $inputs['romaji'];
        $vocabulary->meaning_in_english = $inputs['meaningInEnglish'];
        $vocabulary->meaning_in_burmese = $inputs['meaningInBurmese'];
        $vocabulary->save();

        return redirect('/vocabularies')->with('success', 'Vocabularies has been updated');
    }

    public function destroy($id)
    {

    }
}
