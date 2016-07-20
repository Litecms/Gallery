<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('gallery::gallery.name') !!} [{!!$gallery->title!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#gallery-gallery-edit'  data-load-to='#gallery-gallery-entry' data-datatable='#gallery-gallery-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#gallery-gallery-entry' data-href='{{Trans::to('admin/gallery/gallery')}}/{{$gallery->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#gallery" data-toggle="tab">{!! trans('gallery::gallery.tab.name') !!}</a></li>
            <li><a href="#detail" data-toggle="tab">Images</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('gallery-gallery-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/gallery/gallery/'. $gallery->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="gallery">
                @include('gallery::admin.gallery.partial.entry')
                <div class='col-md-6 col-sm-12'>
                  <label>Image</label>
                      {!!Filer::uploader('image',@$gallery->getUploadURL('image'),1)!!}
                      {!! Filer::editor('image', @$gallery['image'],1) !!}
                </div>
                </div>

                <div class="tab-pane" id="detail">
                <div class='col-md-6 col-sm-6'>
                    <label>Images</label>
                    {!! Filer::uploader('images', $gallery->getUploadURL('images')) !!}
                    {!! Filer::editor('images', $gallery['images']) !!}
                </div>
                </div>

            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
