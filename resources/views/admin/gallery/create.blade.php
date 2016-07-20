<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('gallery::gallery.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#gallery-gallery-create'  data-load-to='#gallery-gallery-entry' data-datatable='#gallery-gallery-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#gallery-gallery-entry' data-href='{{Trans::to('admin/gallery/gallery/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Gallery</a></li>
            <li><a href="#detail" data-toggle="tab">Images</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('gallery-gallery-create')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/gallery/gallery'))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('gallery::admin.gallery.partial.entry')
                <div class='col-md-6 col-sm-12'>
                  <label>Image</label>
                      {!!Filer::uploader('image',@$gallery->getUploadURL('image'),1)!!}
                      {!! Filer::editor('image', @$gallery['image'],1) !!}
                </div>
            </div>


            <div class="tab-pane" id="detail">
                <div class='col-md-12 col-sm-12'>
                    <label>Images</label>
                    {!! Filer::uploader('images', $gallery->getUploadURL('images')) !!}
                    {!! Filer::editor('images', $gallery['images']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
