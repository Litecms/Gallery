<section class="gallery-wraper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h1 class="main-title">
                    <small>Happy Memories</small>
                    Gallery <span>{!! @$gallery['title'] !!}</span>
                </h1>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                <img src="{!!trans_url('img/gallery-side-icon.png')!!}" alt="">
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-md-12">
                <div class="grid">
                    <div id="js-grid-masonry" class="cbp">

                        @foreach($gallery->getImages('gallery.md','images') as $key => $image)
                        <div class="cbp-item img_box">
                        @if(!empty($gallery['images']))
                            <?php
                                $file = $gallery['images'][$key];

                                $info = pathinfo($file['file']);
                                $ext = strtolower($info['extension']);
                            ?>


                                @if (in_array(@$ext, ['jpg','jpeg', 'png', 'gif']) )
                                <a href="{!! URL::to($image)!!}" class="cbp-caption cbp-lightbox" data-title="{!! @$file['caption'] !!}">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="{!! URL::to($image)!!}" class="img-thumbnail image-responsive">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">{!! @$file['caption'] !!}</div>
                                                <!-- <div class="cbp-l-caption-desc">&nbsp;</div> -->
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                 @endif
                            @else
                            <a href="{!! URL::to($image)!!}" class="cbp-caption cbp-lightbox" data-title="No Images">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{!! URL::to($image)!!}" class="img-thumbnail image-responsive">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">No Images</div>
                                            <!-- <div class="cbp-l-caption-desc">&nbsp;</div> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
.modal-backdrop.in {
    opacity: -0.5;
    z-index: 0;
}
</style>
<script type="text/javascript">
$('document').ready(function(){
    $(".remove-image").on('click', function(e){
        $(this).parents('.img_box').remove();
        e.preventDefault();
    });
    $('#js-grid-masonry').cubeportfolio({
        filters: '#js-filters-masonry',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideDelay',
        gapHorizontal: 10,
        gapVertical: 10,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 5
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'overlayBottomAlong',
        displayType: 'bottomToTop',
        displayTypeSpeed: 100,

        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter"></div>',

        singlePageDelegate: null
    });
});
</script>