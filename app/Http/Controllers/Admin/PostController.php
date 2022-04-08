<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Doctrine\Inflector\Rules\Word;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mostra elenco di tutti i post
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // voglio ottenere tutte le categorie e poter tornare tutte le categorie del db
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // funzione validazione dati
        $request->validate(
            [
                'title'=>'required|min:5',
                'content'=>'required|min:10',
                'category_id' => 'nullable|exists:categories,id'
            ]
        );

            // TITOLO: Lavoro futuro
            // SLUG: lavoro-futuro

            $data = $request->all();
            $slug = Str::slug($data['title']);

            
            $counter = 1;

            // cerca title post se già esiste un post con questo slug generane uno diverso
            while(Post::where('slug', $slug)->first()) {
                // lavoro-futuro-1
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;
            };

            $data['slug'] = $slug;

            $post = new Post();
            $post->fill($data);
            $post->save();
            return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // funzione validazione dati aggiornati
        $request->validate(
            [
                'title'=>'required|min:5',
                'content'=>'required|min:10',
                'category_id' => 'nullable|exists:categories,id'
            ]
            );

            $data = $request->all();
            $slug = Str::slug($data['title']);

            if ($post->slug != $slug) {

                $counter = 1;

                // cerca title post se già esiste un post con questo slug generane uno diverso
                while(Post::where('slug', $slug)->first()) {
                    $slug = Str::slug($data['title']) . '-' . $counter;
                    $counter++;
                }

                $data['slug'] = $slug;

            }
            
            $post->update($data);
            $post->save();
            
            return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Eliminazione post
        // cancellazione elemento su db
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
