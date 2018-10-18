    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#gallery" data-toggle="tab">{!! trans('gallery::gallery.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#gallery-gallery-edit'  data-load-to='#gallery-gallery-entry' data-datatable='#gallery-gallery-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#gallery-gallery-entry' data-href='{{guard_url('gallery/gallery')}}/{{$gallery->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('gallery-gallery-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('gallery/gallery/'. $gallery->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="gallery">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('gallery::gallery.name') !!} [{!!$gallery->title!!}] </div>
                @include('gallery::admin.gallery.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>