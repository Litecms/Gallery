<div class='col-md-4 col-sm-6'>
  {!! Form::hidden('upload_folder')!!}
                       {!! Form::text('title')
                       -> label(trans('gallery::gallery.label.title'))
                       -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('image')
                       -> label(trans('gallery::gallery.label.image'))
                       -> placeholder(trans('gallery::gallery.placeholder.image'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('images')
                       -> label(trans('gallery::gallery.label.images'))
                       -> placeholder(trans('gallery::gallery.placeholder.images'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('status')
                       -> label(trans('gallery::gallery.label.status'))
                       -> placeholder(trans('gallery::gallery.placeholder.status'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}
