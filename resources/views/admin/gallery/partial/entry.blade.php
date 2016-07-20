<div class='col-md-6 col-sm-6'>
                       {!! Form::text('title')
                       ->required()
                       -> label(trans('gallery::gallery.label.title'))
                       -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::select('status')
                       -> options(trans('gallery::gallery.options.status'))
                       -> label(trans('gallery::gallery.label.status'))
                       -> placeholder(trans('gallery::gallery.placeholder.status'))!!}
                </div>
