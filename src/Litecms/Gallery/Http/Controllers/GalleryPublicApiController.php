<?php

namespace Litecms\Gallery\Http\Controllers;

use App\Http\Controllers\PublicApiController as PublicController;
use Litecms\Gallery\Interfaces\GalleryRepositoryInterface;
use Litecms\Gallery\Repositories\Presenter\GalleryItemTransformer;

/**
 * Pubic API controller class.
 */
class GalleryPublicApiController extends PublicController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Gallery\Interfaces\GalleryRepositoryInterface $gallery
     *
     * @return type
     */
    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->repository = $gallery;
        parent::__construct();
    }

    /**
     * Show gallery's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $galleries = $this->repository
            ->setPresenter('\\Litecms\\Gallery\\Repositories\\Presenter\\GalleryListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $galleries['code'] = 2000;
        return response()->json($galleries)
            ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show gallery.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $gallery = $this->repository
            ->scopeQuery(function ($query) use ($slug) {
                return $query->orderBy('id', 'DESC')
                    ->where('slug', $slug);
            })->first(['*']);

        if (!is_null($gallery)) {
            $gallery         = $this->itemPresenter($module, new GalleryItemTransformer);
            $gallery['code'] = 2001;
            return response()->json($gallery)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

}
