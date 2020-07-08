@extends('layouts.admin.app')
@section('scripts')
    <script>
        $(function() {
            $('#example').dataTable({
                "pageLength": 50
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
                            type: "DELETE",
                            url: baseUrl + "/admin/seos/"+ id,
                            dataType: 'json',
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
                    Seo</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Seo</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Seo</h5>
            <div class="heading-elements">
                {{--<a href="{{ route('admin.seos.create') }}" class="btn btn-default legitRipple pull-right">--}}
                    {{--<i class="icon-file-plus position-left"></i>--}}
                    {{--Create New--}}
                    {{--<span class="legitRipple-ripple"></span>--}}
                {{--</a>--}}
            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Page</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="sortable">
                @foreach($seos as $index=>$seo)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $seo->page }}</td>
                        <td>{{ $seo->meta_title }}</td>
                        <td>{{ $seo->meta_description }}</td>
                        <td>
                            <a href="{{ route('admin.seos.edit',$seo->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                            @if($admin->can('delete', $seo))
                                <a href="javascript:void(0)" class="delete btn btn-danger" id="{{ $seo->id }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>S.No</th>
                    <th>Page</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection