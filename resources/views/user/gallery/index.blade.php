<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">
                My
                <span>
                    Gallerys
                </span>
            </h3>
            <p class="panel-sub-title m-t-5 text-muted">
                Sub title goes here with small font

            </p>
        </div>
        <div class="panel-body">
            @include('gallery::user.gallery.create')
            <div class="row m-t-20">
                @foreach($galleries as $galleries)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="my-album-wraper">
                        <a href="{{ trans_url('/user/gallery/gallery') }}/{{ $galleries->getRouteKey() }}/edit" class="my-album-inner">
                            <div class="my-gallery-image">
                            @if(!empty(@$galleries['image']))
                            <img src="{!!trans_url('image/sm/'.@$galleries['image']['efolder'])!!}/{!!@$galleries['image']['file']!!}" >
                           
                            @else
                            <img src="{!!trans_url('img/380x360/104.jpg')!!}">
                            @endif

                            </div>
                            <div class="my-album-title">
                                <div class="my-album-title-inner">{{$galleries->title}}</div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
