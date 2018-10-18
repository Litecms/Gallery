    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('gallery::gallery.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#gallery-gallery-entry' data-href='{{guard_url('gallery/gallery/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($gallery->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#gallery-gallery-entry' data-href='{{ guard_url('gallery/gallery') }}/{{$gallery->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#gallery-gallery-entry' data-datatable='#gallery-gallery-list' data-href='{{ guard_url('gallery/gallery') }}/{{$gallery->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('gallery-gallery-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('gallery/gallery'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('gallery::gallery.name') !!}  [{!! $gallery->title !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('gallery::admin.gallery.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>