<?php

namespace Litecms\Gallery\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class GalleryListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GalleryListTransformer();
    }
}
