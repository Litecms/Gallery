@include('gallery::gallery.partial.header')
<section class="content bg-grey">
    <div class="container">
        <div class="gallery">
            <div class="row">
                <div class="col-md-12">
                    @foreach($galleries->chunk(3) as $gallery)
                        <div class="row">
                           @foreach($gallery as $image)
                           <div class="col-md-4 portfolio-image">
                              <a href="{{trans_url('gallery/'.$image->slug)}}">
                              <img class="img-responsive" src="{{url($image->defaultImage('images', 'lg'))}}" alt="">
                              </a>
                              <h3>
                                 <a href="{{trans_url('gallery/'.$image->slug)}}">{{ $image->title }}</a>
                              </h3>
                              <p>{{ str_limit($image->details, 121) }}...</p>
                           </div>
                           @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
