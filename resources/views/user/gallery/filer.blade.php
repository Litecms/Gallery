{!!Form::hidden($field)->forceValue('0')!!}
<div class="row m-t-20">
    <div class="col-md-12">
        <div class="grid">
            <div id="js-grid-masonry" class="cbp">
                @forelse($files as $key => $file)
                <div class="cbp-item img_box" id="img_box_{!!$field!!}_{!!$key!!}">
                    <?php
                        $info = pathinfo($file['file']);
                        $ext  = strtolower($info['extension']);
                    ?>
                    @if (in_array($ext, ['jpg','jpeg', 'png', 'gif']) )
                    <a href="{!! URL::to('/file/'.$file['efolder'])!!}/{!!$file['file']!!}" class="cbp-caption cbp-lightbox" data-title="{!! @$file['caption'] !!}">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! URL::to('/image/ge/'.$file['efolder'])!!}/{!! $file['file'] !!}" class="img-thumbnail image-responsive">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{!! @$file['caption'] !!}</div>
                                    <div class="cbp-l-caption-desc">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                    <div class="btn_container">
                        <a href="#" class="remove-image" data-id='{!!$key!!}' title="Remove Image">
                        <span class="fa-stack fa-xs">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                        </span>
                        </a>
                        <a href="#"  data-toggle="modal" data-target="#img_popup_{!!$key!!}">
                        <span class="fa-stack fa-xs" >
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                        </a>
                    </div>
                    <div class="modal fade  bs-example-modal-sm" style="z-index:9999;" tabindex="-1" id="img_popup_{!!$key!!}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Caption</h4>
                                </div>
                                <div class="modal-body">
                                    @if (in_array($ext, ['jpg','jpeg', 'png', 'gif']) )
                                        <a href="{!! URL::to('/file/'.$file['efolder'])!!}/{!!$file['file']!!}" target="_blank"><img src="{!! URL::to('/image/ge/'.$file['efolder'])!!}/{!! $file['file'] !!}" class="img-thumbnail image-responsive"></a>
                                    @else
                                        <a href="{!! URL::to('/file/'.$file['efolder'])!!}/{!!$file['file']!!}" target="_blank">{!!$file['file']!!}</a>
                                    @endif
                                    {!!Form::text($field."[$key][caption]", 'Caption')->value(@$file['caption'])!!}
                                    {!!Form::hidden($field."[$key][efolder]")->value(@$file['efolder'])->raw()!!}
                                    {!!Form::hidden($field."[$key][folder]")->value(@$file['folder'])->raw()!!}
                                    {!!Form::hidden($field."[$key][time]")->value(@$file['time'])->raw()!!}
                                    {!!Form::hidden($field."[$key][file]")->value(@$file['file'])->raw()!!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Save &amp; Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                Upload file(s).
                @endif
            </div>
        </div>
    </div>
</div>
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

