<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('gallery::gallery.name') !!}  [{!! $gallery->title !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#gallery-gallery-entry' data-href='{{trans_url('admin/gallery/gallery/create')}}'><i class="fa fa-times-circle"></i> New</button>
        @if($gallery->id )
         @if($gallery->published == 'Yes')
            <button type="button" class="btn btn-warning btn-sm" data-action="PUBLISHED" data-load-to='#gallery-gallery-entry' data-href="{{trans_url('admin/gallery/gallery/status/'. @$gallery->getRouteKey())}}" data-value="No" data-datatable='#gallery-gallery-list'><i class="fa fa-times-circle"></i> Suspend</button>
        @else
            <button type="button" class="btn btn-success btn-sm" data-action="PUBLISHED" data-load-to='#gallery-gallery-entry' data-href="{{trans_url('admin/gallery/gallery/status/'. $gallery->getRouteKey())}}" data-value="Yes" data-datatable='#gallery-gallery-list'><i class="fa fa-check"></i> Published</button>
        @endif
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#gallery-gallery-entry' data-href='{{ trans_url('/admin/gallery/gallery') }}/{{$gallery->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#gallery-gallery-entry' data-datatable='#gallery-gallery-list' data-href='{{ trans_url('/admin/gallery/gallery') }}/{{$gallery->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> Delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('gallery::gallery.name') !!}</a></li>
            <li><a href="#detail" data-toggle="tab">Images</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('gallery-gallery-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/gallery/gallery'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('gallery::admin.gallery.partial.entry')
                    <div class='col-md-6 col-sm-6'>
               
               <label>Image</label><br>
                    <img src="{!!url($gallery->defaultImage('gallery.sm','image'))!!}">
                    
                </div>
                </div>
                     <div class="tab-pane" id="detail">
                    <div class='col-md-6 col-sm-6'>
                    
                     <label>Images</label><br>
                          @foreach($gallery->getImages('gallery.sm', 'images') as $image)
                    <img src="{!!url(@$image)!!}" class="img-responsive">                     
                    @endforeach
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
