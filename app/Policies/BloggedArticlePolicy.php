<?php

namespace App\Policies;

use App\Post;
use App\User;
use BinaryTorch\Blogged\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class BloggedArticlePolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view any posts.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the article.
     *
     * @param \App\User $user
     * @param Article $article
     * @return  mixed
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param \App\User $user
     * @return  mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param \App\User $user
     * @param Article $article
     * @return  mixed
     */
    public function update(User $user, Article $article)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param \App\User $user
     * @param Article $article
     * @return  mixed
     */
    public function delete(User $user, Article $article)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        } else {
            return false;
        }
    }
}
