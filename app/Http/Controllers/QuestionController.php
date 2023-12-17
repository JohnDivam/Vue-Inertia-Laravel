<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('answers')->get();
        return Inertia::render('Questions/index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:150',
            'answsers' => 'required|array',
            'answsers.*.answer' => 'required|string|max:150',
            'answsers.*.isCorrect' => 'required||in:0,1',
        ]);
        

        $question = Question::create([
            'name' =>$data['question']
        ]);
       
        $question->answers()->createMany($data['answsers']);
        
         return redirect()->back()->with('success','Question created succcefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
