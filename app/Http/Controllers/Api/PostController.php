<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::GetPosts());
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */


    public function show($id): PostResource|\Illuminate\Http\Response
    {
        /* $posts = Post::paginate(3);
         return view('index', compact('posts'));*/
        //return new PostResource(Post::findOrFail($id));
        return new PostResource(Post::Show($id));
    }


    public function update(PostRequest $request, Post $post): PostResource
    {
        /*$post = new Post;
        return view('update-post', ['post' => $post->find($id)]);
         */

        $post->update($request->validated());
        return new PostResource($post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function store(PostRequest $request)
    {
        /* $created_post = Post::create($request->validated());
        return new PostResource($created_post);*/
        return new PostResource(Post::Store($request));

        /* $post = new Post();
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             $path = $file->store('files');
             $post->create(['file' => 'storage/public/files/' . $path,
                 'title' => $request->input('title'),
                 'keywords' => $request->input('keywords'),
                 'text' => $request->input('text')]);
         } else {
             $post->title = $request->input('title');
             $post->keywords = $request->input('keywords');
             $post->text = $request->input('text');
             $post->save();
         }
         return redirect()->route('ok')->with('success', "Data has been added");*/


    }

    public function showOnePost($id)
    {
        $post = new Post;
        return view('post', ['post' => $post->find($id)]);
    }

    public function updatePost($id, PostRequest $request)
    {
        $post = Post::find($id);
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

    public function findPost($keywords)
    {

        /*$query = Post::where('title', 'like', '%' . $keywords . '%')
            ->orWhere('text', 'like', '%' . $keywords . '%')
            ->limit(2)
            ->get();
        return PostResource::collection($query);*/
        return PostResource::collection(Post::FindPost($keywords));
    }


}
