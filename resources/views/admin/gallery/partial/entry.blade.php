            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('gallery::gallery.label.title'))
                       -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                </div>
               <div class='col-md-4 col-sm-6'>
                    {!! Form::select('published')
                    -> options(trans('gallery::gallery.options.published'))
                    -> label(trans('gallery::gallery.label.published'))
                    -> placeholder(trans('gallery::gallery.placeholder.published'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('gallery::gallery.options.status'))
                    -> label(trans('gallery::gallery.label.status'))
                    -> placeholder(trans('gallery::gallery.placeholder.status'))!!}
               </div>
                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('gallery::gallery.label.image') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $gallery->files('image')
                            ->url($gallery->getUploadUrl('image'))
                            ->mime(config('filer.image_extensions'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                        {!! $gallery->files('image')
                        ->editor()!!}
                        </div>
                    </div>
                </div>
                
               
            </div>