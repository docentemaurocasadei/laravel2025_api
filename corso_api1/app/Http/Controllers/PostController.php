<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        return response()->json(Post::all());
    }
    public function show(Request $request, Post $post){
        return response()->json($post);
    }
    public function store(Request $request){
        $validated = $this->validateRequest($request);
        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => $validated['slug'],
            'user_id' => $request->user()->id, //associato all'utente autenticato
        ];
        $post = Post::create($data);
        return response()->json($post, 201);
    }
    public function update(Request $request, Post $post){
        $validated = $this->validateRequest($request, $post->id);
        $post->update($validated);
        return response()->json($post, 200);
    }
    public function destroy(Request $request, Post $post){
        $post->delete();
        return response()->json(null, 204);
    }
    public function validateRequest(Request $request, $postId = null)
{
    return $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'slug' => [
            'required',
            'string',
            Rule::unique('posts', 'slug')->ignore($postId),
        ],
    ], [
        'slug.unique' => 'Il campo slug deve essere unico.',
        'title.required' => 'Il campo titolo è obbligatorio.',
        'content.required' => 'Il campo contenuto è obbligatorio.',
    ]);
}

}