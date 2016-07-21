@include('public::notifications')

    {!!Form::vertical_open()
    ->id('create-gallery-gallery')
    ->method('POST')
    ->files('true')
    ->addClass('dashboard-form')
    ->action(URL::to('user/gallery/gallery'))!!}
            <div class="row">
                    <div class="col-sm-12">
                         {!! Form::text('title')
                        -> required()
                        -> label(trans('gallery::gallery.label.title'))
                        -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-12 profile-pic">
                        <label for="name">Gallery Image</label>
                         {!!Filer::uploader('image',@$gallery->getUploadURL('image'),1)!!}
                         {!! Filer::editor('image', @$gallery['image'],1) !!}

                </div>
            </div>
            <div class="row m-t-20">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-danger waves-effect waves-float text-uppercase">Create Gallery</button>
                </div>
            </div>
              {!! Form::hidden('upload_folder')!!}
    {!! Form::close() !!}
