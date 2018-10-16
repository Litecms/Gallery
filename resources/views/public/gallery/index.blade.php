@include('gallery::gallery.partial.header')
<section class="content bg-grey">
                <div class="container">
                    <div class="gallery">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="grid work-3col lightbox-gallery">
                                   <li class="sizer"></li>
                                    @foreach($galleries as $gallery)
                                    <li class="item" data-src="{{url($gallery->defaultImage('image'))}}"  data-sub-html="<h4>Armchair Mojo</h4><p>Gallery</p>">
                                        <a href="{{url($gallery->defaultImage('image'))}}" title="Armchair Mojo">
                                            <figure>
                                                <div class="img"><img src="{{url($gallery->defaultImage('image'))}}" alt="" class="project-img-gallery"/></div>
                                                <figcaption>
                                                    <div class="hover-main text-center">
                                                        <div class="box">
                                                            <div class="content">
                                                                <i class="ti-zoom-in"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
