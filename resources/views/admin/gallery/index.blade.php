@extends('layouts.admin.app')
        @section('styles')
<link rel="stylesheet" href="{{ asset('backend/tablednd.css') }}">
    @endsection
    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('backend/tablednd.js') }}"></script>
    <script>
        $(function(){
        $('.defaultTable').dataTable( {
        "pageLength": 50
        } );
        $('#sortable').sortable({
        axis: 'y',
        update: function(event, ui){
        var data = $(this).sortable('serialize');
        var url = "{{ url('admin/gallery/sort') }}";
        $.ajax({
        type: "POST",
        url: url,
        datatype: "json",
        data: {order: data, _token: '{!! csrf_token() !!}'},
        success: function(data){
        console.log(data);
        var obj = jQuery.parseJSON(data);
        swal({
        title: "Success!",
        text: "Article has been sorted.",
        imageUrl: "{{ asset('backend') }}/thumbs-up.png",
        timer: 2000,
        showConfirmButton: false
        });
        }
        });
        }
        });
        });

        $(document).ready(function () {
        $(".defaultTable").on("click", ".change-status", function () {
        $object = $(this);
        var id = $object.attr('id');
        Swal({
        title: 'Are you sure?',
        text: 'Do you want to change the status',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'No, keep it'
        }).then((result) => {
        if (result.value) {
        $.ajax({
        type: "POST",
        url: "{{ route('admin.gallery.change-status') }}",
        data: {
        'id': id,
        },
        dataType: 'json',
        success: function (response) {
        console.log(response);
        swal("Thank You!", response.message, "success");
        if (response.response.is_active == 1) {
        $($object).children().removeClass('icon-minus2');
        $($object).children().addClass('icon-checkmark3');
        } else {
        $($object).children().removeClass('icon-checkmark3');
        $($object).children().addClass('icon-minus2');
        }
        },
        error: function (e) {
        if (e.responseJSON.message) {
        Swal('Error', e.responseJSON.message, 'error');
        } else {
        Swal('Error', 'Something went wrong while processing your request.', 'error')
        }
        }
        });

        }
        })
        });

        $(".defaultTable").on("click", ".delete", function () {
        $object = $(this);
        var id = $object.attr('id');

        Swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this !',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
        }).then((result) => {
        if (result.value) {

        $.ajax({
        type: "POST",
        url: baseUrl + "/admin/gallery" + "/" + id,
        data: {
        id: id,
        _method: 'DELETE'
        },
        success: function (response) {
        swal("Deleted!", response.message, "success");
        var oTable = $('.defaultTable').dataTable();
        var nRow = $($object).parents('tr')[0];
        oTable.fnDeleteRow(nRow);
        },
        error: function (e) {
        if (e.responseJSON.message) {
        Swal('Error', e.responseJSON.message, 'error');
        } else {
        Swal('Error', 'Something went wrong while processing your request.', 'error')
        }
        }
        });
        }
        })
        });
        });
    </script>
    @endsection
    @section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Gallery</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active"> Gallery</li>
            </ul>
        </div>
    </div>
    @endsection
    @section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i> Gallery</h5>
            <div class="heading-elements">
                @can('master-policy.perform', ['gallery', 'add'])
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-file-plus position-left"></i>
                    Create New
                    <span class="legitRipple-ripple"></span>
                </a>
                @endif
            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                    <tr>
                                            <th>S. No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                </thead>
                <tbody id="sortable">

 @foreach($galleries as $key=>$item)
                    <tr id="item-{{ $item->id }}">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @if(file_exists('storage/'.$item->image) && $item->image != '')
                            <img src="{{ asset('storage/'.$item->image) }}"  style="width:180px; height:100px;" alt="{{$item->title}}">

                            @endif
                        </td>
                        <td>
                            <a href="javascript:void(0)"
                               title="Change-status"
                               data-toggle="tooltip"
                               class="btn btn-primary btn-icon btn-rounded legitRipple change-status"
                               id="{{ $item->id }}">
                                @if($item->is_active == 1)
                                <i class="icon-checkmark3"></i>
                                @else
                                <i class="icon-minus2"></i>
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.gallery.edit',$item->id) }}"
                               title="Edit-Gallery"
                               data-toggle="tooltip"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-database-edit2"></i>
                            </a>
{{--                            <a href="{{ route('admin.video.show',$item->id) }}"--}}
{{--                               title="Add video"--}}
{{--                               data-toggle="tooltip"--}}
{{--                               class="btn btn-info btn-icon btn-rounded legitRipple">--}}
{{--                                <i class="icon-video-camera"></i>--}}
{{--                            </a>--}}
                            <a href="{{ route('admin.gallery-image.index', [$item->id])}}"
                               title="Add Image to Album"
                               data-toggle="tooltip"
                               class="btn btn-danger btn-icon btn-rounded legitRipple">
                                <i class="icon-gallery "></i>
                            </a>
                            <a href="javascript:void(0)" id="{{ $item->id  }}"
                               title="Delete-Gallery"
                               data-toggle="tooltip"
                               class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                <i class="icon-cross2"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
           <tr>
                                   <th>S. No.</th>
                                   <th>Title</th>
                                   <th>Image</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>

                </tfoot>
            </table>

        </div>
    </div>
    @endsection
