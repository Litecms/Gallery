            <div class='row'>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('gallery::gallery.label.title'))
                       -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('gallery::gallery.options.status'))
                    -> label(trans('gallery::gallery.label.status'))
                    -> placeholder(trans('gallery::gallery.placeholder.status'))!!}
               </div>
                <div class='col-md-12 col-sm-12'>
                       {!! Form::text('details')
                       -> label(trans('gallery::gallery.label.details'))
                       -> placeholder(trans('gallery::gallery.placeholder.details'))!!}
                </div>
                <div class='col-md-12 col-sm-12'>
                    <div class="row">
                        <div class="form-group">
                            <label for="images" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('gallery::gallery.label.images') }}
                            </label>
                            @if($mode == 'create' || $mode == 'edit')
                                <div class='col-lg-12 col-sm-12'>
                                    {!! $gallery->files('images')
                                    ->url($gallery->getUploadUrl('images'))
                                    ->mime(config('filer.image_extensions'))
                                    ->dropzone()!!}
                                </div>
                                
                            @else
                                <div class='col-lg-12 col-sm-12'>
                                {!! $gallery->files('images')
                                ->show()!!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
               
            </div>