@extends('layouts.admin.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/tablednd.css') }}">
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('backend/tablednd.js') }}"></script>
    <script>
        $(function(){
            $('#example').dataTable( {
                "pageLength": 50
            } );
            $('#sortable').sortable({
                axis: 'y',
                update: function(event, ui){
                    var data = $(this).sortable('serialize');
                    var url = "{{ url('admin/video/sort') }}";
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
                                text: "Video has been sorted.",
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
                            url: rootUrl + "/admin/video" + "/" + id,
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
                    Video Links</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Video Links</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Video Links</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.video.create',$id) }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-file-plus position-left"></i>
                    Create New
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Action</th>
                    <th style="width: 1%">&nbsp;</th
                </tr>
                </thead>
                <tbody id="sortable">


                @foreach($videos as $key=>$item)
                    <tr id="item-{{ $item->id }}">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                          <iframe width="100px" height="100px" src="https://www.youtube.com/embed/{{$item->link}}" frameborder="0" allowfullscreen></iframe>

                        </td>

                        <td>
                            <button data-id="{{ $item->id }}" type="button" class="btn btn-primary btn-icon btn-rounded legitRipple videoView" data-toggle="modal" data-target="#video-{{$item->id}}">
                                <i class=" icon-eye"></i>
                            </button>

                            <!-- Modal -->
                            <div id="video-{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content" style="height: 0px; width: 0px;">
                                     <iframe width="800px" height="500px" src="https://www.youtube.com/embed/{{$item->link}}" frameborder="0" allowfullscreen></iframe>

                                    </div>

                                </div>
                            </div>


                            <a href="{{ route('admin.video.edit',$item->id) }}"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-database-edit2"></i>
                            </a>
                            <a href="javascript:void(0)" id="{{ $item->id  }}"
                               class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                <i class="icon-cross2"></i>
                            </a>

                        </td>
                        <td style="width: 1%"></td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th style="width: 1%">&nbsp;</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection