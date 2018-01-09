<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
class NotesController extends Controller
{
    public function index(Request $request) {
        if ($request->user()) {
            return [
                'status' => 'success',
                'data' => Note::with('user')->where('user_id', $request->user()->id)->get()
            ];
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);

       $note = $request->user()->notes()->save(
            new Note([
                'title' => $request->title,
                'body' => $request->body
            ]));
        $note = Note::with('user')->find($note->id);
        return [
            'status' => 'success',
            'code' => 200,
            'data' => $note
        ];
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);
        
        $note = Note::findOrFail($id);
        
        $note->title = $request->title;
        $note->body = $request->body;
        
        $note->save();

        return [
            'status' => 'success',
            'code' => 200,
            'data' => $note,
        ];
    }

    public function destroy($id) {
        $note = Note::findOrFail($id);
        $note->delete();
        return [
            'status' => 'success',
            'message' => 'note deleted'
        ];
    }
}
