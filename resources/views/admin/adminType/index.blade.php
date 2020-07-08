@extends('layouts.admin.app')
@section('scripts')
    <script>
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
                            url: "{{ route('admin.admin-type.change-status') }}",
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
                            url: rootUrl + "/admin/admin-type" + "/" + id,
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
                    Admin Type</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Admin Type</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Admin Type</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.admin-type.create') }}" class="btn btn-default legitRipple pull-right">
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
                    {{--<th>Status</th>--}}
                    <th>Action</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                </tr>
                </thead>
                <tbody>


                @foreach($adminTypes as $key=>$adminType)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $adminType->name }}</td>
                       {{-- <td>
                            <a href="javascript:void(0)"
                               class="btn btn-primary btn-icon btn-rounded legitRipple change-status"
                               id="{{ $adminType->id }}">
                                @if($adminType->is_active == 1)
                                    <i class="icon-checkmark3"></i>
                                @else
                                    <i class="icon-minus2"></i>
                                @endif
                            </a>
                        </td>--}}
                        <td>
                            <a href="{{ route('admin.admin-type.edit',$adminType->id) }}"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-database-edit2"></i>
                            </a>

                            <a href="{{ route('admin.admin-access.create',$adminType->id) }}"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-database"></i>
                            </a>

                            <a href="{{ route('admin.admin-list.index',$adminType->id) }}"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-eye"></i>
                            </a>

                            <a href="javascript:void(0)" id="{{ $adminType->id  }}"
                               class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                <i class="icon-cross2"></i>
                            </a>
                        </td>
                        <td style="width: 1%;">&nbsp;</td>
                        <td style="width: 1%;">&nbsp;</td>
                        <td style="width: 1%;">&nbsp;</td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    {{--<th>Status</th>--}}
                    <th>Action</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection