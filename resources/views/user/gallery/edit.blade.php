@include('public::notifications')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="dashboard-content">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading"  id="{!! $gallery->getRouteKey() !!}">
                <div class="row">
                    <div class="col-sm-8">
                            <h3 class="panel-title"> My <span>{!! trans('gallery::gallery.names') !!}</span></h3>
                            <p class="panel-sub-title m-t-5 text-muted">Edit [{!! $gallery->title !!}]</p>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-sm waves-effect btn-danger text-uppercase pull-right" data-action="DELETE" data-href="{{ trans_url('/user/gallery/gallery') }}/{!! $gallery->getRouteKey() !!}" data-remove="{!! $gallery->getRouteKey() !!}">
                            Delete Gallery
                        </a>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                {!!Form::vertical_open()
                ->id('edit-gallery-gallery')
                ->addClass('dashboard-form')
                ->method('PUT')
                ->files('true')
                ->action(URL::to('user/gallery/gallery') .'/'.$gallery->getRouteKey())!!}
                <div class="row">
                        <div class="col-lg-6">
                             {!! Form::text('title')
                            -> required()
                            -> label(trans('gallery::gallery.label.title'))
                            -> placeholder(trans('gallery::gallery.placeholder.title'))!!}
                        </div>
                        <div class="col-lg-6">
                            <label for="name">Gallery Image</label>
                        {!!Filer::uploader('image',@$gallery->getUploadURL('image'),1)!!}
                        {!! Filer::editor('image', @$gallery['image'],1) !!}
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 profile-pic">
                        <label for="name">Upload Images</label>
                        {!! Filer::uploader('images', $gallery->getUploadURL('images')) !!}
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-12">
                      {!! Filer::editor('images', @$gallery['images'],20,'gallery::user.gallery.filer') !!}
                    </div>
                </div>
                  {!! Form::hidden('upload_folder')!!}
                <div class="row m-t-40">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-danger waves-effect waves-float text-uppercase m-r-5 ">Update Images</button>
                        <a href="{!!trans_url('/user/gallery/gallery')!!}" class="btn btn-inverse waves-effect waves-float btn-sm text-uppercase"> Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
