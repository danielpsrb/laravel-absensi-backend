<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
     //index
    public function index(Request $request)
    {
        //notes by user id
        $notes = Notes::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        return response()->json(['notes' => $notes], 200);
    }

    //create note
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note = new Notes();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->user_id = $request->user()->id;
        $note->save();
        return response()->json(['message' => 'Note created successfully'], 201);
    }
}
