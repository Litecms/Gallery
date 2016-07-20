<?php

namespace Litecms\Gallery\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\Gallery\Models\Gallery;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the gallery.
     *
     * @param User $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function view(User $user, Gallery $gallery)
    {

        if ($user->canDo('gallery.gallery.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $gallery->user_id;
    }

    /**
     * Determine if the given user can create a gallery.
     *
     * @param User $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->canDo('gallery.gallery.create');
    }

    /**
     * Determine if the given user can update the given gallery.
     *
     * @param User $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function update(User $user, Gallery $gallery)
    {

        if ($user->canDo('gallery.gallery.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $gallery->user_id;
    }

    /**
     * Determine if the given user can delete the given gallery.
     *
     * @param User $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function destroy(User $user, Gallery $gallery)
    {

        if ($user->canDo('gallery.gallery.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $gallery->user_id;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {

        if ($user->isSuperUser()) {
            return true;
        }

    }

}
