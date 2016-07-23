
    {!!Form::hidden($field)->forceValue('0')!!}
    <div id="sortable_{!!$field!!}">
    <div class="grid">
      <div id="js-grid-masonry" class="cbp">
        @forelse($files as $key => $file)
        <div class="cbp-item img_box" id="img_box_{!!$field!!}_{!!$key!!}" class="img_box col-md-3 col-sm-3 col-xs-6">
            <div class="img_container">
                <?php
                    $info = pathinfo($file['file']);
                    $ext = strtolower($info['extension']);
                ?>
                @if (in_array($ext, ['jpg','jpeg', 'png', 'gif']) )
                    <a class="cbp-caption cbp-lightbox" href="{!! url('/file/'.folder_encode($file['folder']))!!}/{!!$file['file']!!}" target="_blank">
                  <div class="cbp-caption-defaultWrap">
                      <img src="{!! url('/image/gallery.md/'.folder_encode($file['folder']))!!}/{!! $file['file'] !!}" class="img-thumbnail image-responsive">
                  </div>
                  <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">{!! @$file['caption'] !!}</div>
                                   <!--  <div class="cbp-l-caption-desc">&nbsp;</div> -->
                                </div>
                            </div>
                    </div>
                </a>
                @else
                    <div id="file">
                        <a href="{!! url('/file/'.folder_encode($file['folder']))!!}/{!!$file['file']!!}" target="_blank">{!!$file['file']!!}</a>
                    </div>
                @endif
                <div class="btn_container">
                    <a href="#" class="remove-image" data-id='{!!$key!!}'>
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
            </div>
            <div class="modal fade  bs-example-modal-sm" tabindex="-1" id="img_popup_{!!$key!!}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Caption</h4>
                        </div>
                        <div class="modal-body">
                            @if (in_array($ext, ['jpg','jpeg', 'png', 'gif']) )
                                <a href="{!! url('/file/'.$file['folder'])!!}/{!!$file['file']!!}" target="_blank"><img src="{!! url('/image/gallery.md/'.folder_encode($file['folder']))!!}/{!! $file['file'] !!}" class="img-thumbnail image-responsive"></a>
                            @else
                                <a href="{!! url('/file/'.folder_encode($file['folder']))!!}/{!!$file['file']!!}" target="_blank">{!!$file['file']!!}</a>
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

    <script type="text/javascript">
    $('document').ready(function(){
        $(".remove-image").on('click', function(e){
            $(this).parents('.img_box').remove();
            e.preventDefault();
        });
        var el = document.getElementById('sortable_{!!$field!!}');
        var sortable = Sortable.create(el);
    });
    </script>

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