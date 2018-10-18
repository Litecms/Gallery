@include('gallery::gallery.partial.header', 
[
  'title' => $gallery->title, 
  'subtitle' => $gallery->details 
])
<section class="gallery-wraper">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="gallery-single">
                  <div class="fotorama mt-20 mb-30" data-nav="thumbs" data-width="100%" data-allowfullscreen="true" data-fit="contain">
                    @forelse($gallery->getImages('images','lg') as $key=> $image)
                        <a href="{!!url(@$image)!!}" target="_blank">
                            <img  alt="First slide" src="{!!url(@$image)!!}" width =400 height=300>
                        </a>
                    @empty
                    @endif   
                  </div>
                  <p>{{$gallery['description']}}</a>
              </div>
          </div>
      </div>
  </div>
</section>