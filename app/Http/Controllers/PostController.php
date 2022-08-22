<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo '1';
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function show()
    {
        $posts = Post::paginate(3);
       // dd($posts);
        return view('index',compact('posts'));
    }


    public function update($id)
    {
        $post = new Post;
        return view('update-post', ['post' => $post->find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files');
            $post->create(['file' => 'storage/public/files/' . $path ,
                'title' => $request->input('title'),
                'keywords' => $request->input('keywords'),
                'text' => $request->input('text')]);
        } else {
            $post->title = $request->input('title');
            $post->keywords = $request->input('keywords');
            $post->text = $request->input('text');
            $post->save();
        }
        return redirect()->route('ok')->with('success', "Data has been added");
    }

    public function showOnePost($id){
        $post = new Post;
        return view('post', ['post' => $post->find($id)]);
    }

    public function updatePost($id, PostRequest $request){
        $post =  Post::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files');
            $post->create(['file' => '/"/storage/files/' . $path . '/"',
                'title' => $request->input('title'),
                'keywords' => $request->input('keywords'),
                'text' => $request->input('text')]);
        } else {
            $post->title = $request->input('title');
            $post->keywords = $request->input('keywords');
            $post->text = $request->input('text');
            $post->save();
        }
        return redirect()->route('post-data-one', $id)->with('success', "Data has been updated");

    }
}
