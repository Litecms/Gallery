<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">
                 {!! trans('gallery::gallery.user_names') !!}
            </h3>
            <p class="panel-sub-title m-t-5 text-muted">
               {!! trans('gallery::gallery.user_name') !!}

            </p>
        </div>
        <div class="panel-body">
            @include('gallery::user.gallery.create')
            <div class="row m-t-20">
                @foreach($galleries as $key=> $gallery)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="my-album-wraper">
                        <a href="{{ trans_url('/user/gallery/gallery') }}/{{ $gallery->getRouteKey() }}/edit" class="my-album-inner">
                            <div class="my-gallery-image">
                            <img src="{!!url(@$gallery->defaultImage('gallery.sm','image'))!!}" >
                            </div>
                            <div class="my-album-title">
                                <div class="my-album-title-inner">{{$gallery->title}}</div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
