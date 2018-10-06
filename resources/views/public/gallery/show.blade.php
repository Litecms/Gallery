<section class="gallery-wraper">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="gallery-single">
                  <h2>{{$gallery['title']}}</h2>
                  <div class="gallery-list-admin">
                      <span><i class="fa fa-calendar"></i>{{format_date($gallery['created_at'])}}</span>
                  </div>

                  <div class="fotorama mt-20 mb-30" data-nav="thumbs" data-width="100%" data-allowfullscreen="true" data-fit="contain">
                    @forelse($gallery->getImages('images','lg') as $key=> $image)
                                <a href="{!!url(@$image)!!}">
                                    <img data-src="{!!url($gallery->defaultImage('image' ,'lg',$key))!!}" alt="First slide" src="{!!url($gallery->defaultImage('image' ,'lg',$key))!!}" width =200 height=150>
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