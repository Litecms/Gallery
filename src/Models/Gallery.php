<?php

namespace Litecms\Gallery\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Database\Traits\DateFormatter;
use Litepie\Trans\Traits\Translatable;
class Gallery extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, PresentableTrait, DateFormatter;


    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.gallery.gallery.model';


}
