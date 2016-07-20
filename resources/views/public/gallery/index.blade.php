<section class="gallery-wraper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h1 class="main-title">
                    <small>
                        Happy Memories
                    </small>
                    Photo
                    <span>
                        Gallery
                    </span>
                </h1>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                <img alt="" src="img/gallery-side-icon.png">
                </img>
            </div>
        </div>
        <div class="row m-t-20">
                @foreach($galleries as $galleries)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="my-album-wraper">
                        <a class="my-album-inner" href="{{trans_url('galleries')}}/{{@$galleries['slug']}}">
                            <div class="my-gallery-image">
                                @if(!empty($galleries['image']))
                                    <img alt="" class="img-responsive" src="{!!trans_url('/image/ge/'.$galleries['image']['efolder'].'/'.$galleries['image']['file'])!!}">
                                @else
                                    <img class="img-responsive" src="{!!trans_url('img/380x360/104.jpg')!!}">
                                @endif
                            </div>
                            <div class="my-album-title">
                                <div class="my-album-title-inner">
                                    {{$galleries->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</section>
