<?php

namespace Litecms\Gallery\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Gallery\Models\Gallery;

class GalleryPolicy
{

    /**
     * Determine if the given user can view the gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function view(UserPolicy $user, Gallery $gallery)
    {
        if ($user->canDo('gallery.gallery.view') && $user->isAdmin()) {
            return true;
        }

        return $gallery->user_id == user_id() && $gallery->user_type == user_type();
    }

    /**
     * Determine if the given user can create a gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('gallery.gallery.create');
    }

    /**
     * Determine if the given user can update the given gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function update(UserPolicy $user, Gallery $gallery)
    {
        if ($user->canDo('gallery.gallery.edit') && $user->isAdmin()) {
            return true;
        }

        return $gallery->user_id == user_id() && $gallery->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Gallery $gallery)
    {
        return $gallery->user_id == user_id() && $gallery->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Gallery $gallery)
    {
        if ($user->canDo('gallery.gallery.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given gallery.
     *
     * @param UserPolicy $user
     * @param Gallery $gallery
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Gallery $gallery)
    {
        if ($user->canDo('gallery.gallery.approve')) {
            return true;
        }

        return false;
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
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
