<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $id = $post->user_id;
        $user = User::find($id);
        $total_posts =  $user->total_posts;
        if ($total_posts == null){
            $user->update(['total_posts' => 1]);
        }
        else{
            $total_posts++;
            $user->update(['total_posts' => $total_posts]);
        }

    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $id = $post->user_id;
        $user = User::find($id);
        $total_posts =  $user->total_posts;
        if ($total_posts >= 1){
            $total_posts--;
            $user->update(['total_posts' => $total_posts]);
        }
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }




}
