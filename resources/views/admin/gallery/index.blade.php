@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('gallery::gallery.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('gallery::gallery.names') !!}</small>
@stop

@section('title')
{!! trans('gallery::gallery.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('gallery::gallery.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='gallery-gallery-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="gallery-gallery-list" class="table table-striped table-bordered data-table">
    <thead>
        <th>{!! trans('gallery::gallery.label.title')!!}</th>
        <th>{!! trans('gallery::gallery.label.status')!!}</th>
        <th>{!! trans('gallery::gallery.label.published')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[title]')->raw()!!}</th>
        <th>{!! Form::select('search[status]')
                ->options(['' => 'All', 'Hide' => 'Hide' , 'Show' => 'Show'])
                ->raw()!!}
        </th>
         <th>{!! Form::select('search[published]')
              ->options(['' => 'All', 'No' => 'No' , 'Yes' => 'Yes'])
              ->raw()!!}
          </th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#gallery-gallery-entry', '{!!URL::to('admin/gallery/gallery/0')!!}');
    oTable = $('#gallery-gallery-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/gallery/gallery') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#gallery-gallery-list .search_bar input, #gallery-gallery-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },
        "columns": [
            {data :'title'},
            {data :'status'},
             {data :'published'},
        ],
        "pageLength": 50
    });

    $('#gallery-gallery-list tbody').on( 'click', 'tr', function () {

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        var d = $('#gallery-gallery-list').DataTable().row( this ).data();

        $('#gallery-gallery-entry').load('{!!URL::to('admin/gallery/gallery')!!}' + '/' + d.id);

    });
    $("#gallery-gallery-list .search_bar input").on('keyup select', function (e) {
        e.preventDefault();
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#gallery-gallery-list .search_bar select").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop
