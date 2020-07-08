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
                            url: "{{ route('admin.admin-list.change-status') }}",
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
                var user_type_id = $object.data('user_type_id');

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
                            url: rootUrl + "/admin/admin-list" + "/" + user_type_id + "/" + id,
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
                    Admin List</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Admin List</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Admin List</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.admin-list.create', [$adminTypeId]) }}" class="btn btn-default legitRipple pull-right">
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
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                    <th style="width: 1%;">&nbsp;</th>
                </tr>
                </thead>
                <tbody>


                @foreach($admins as $key=>$item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="javascript:void(0)"
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
                            <a href="{{ route('admin.admin-list.edit',$item->id) }}"
                               class="btn btn-success btn-icon btn-rounded legitRipple">
                                <i class=" icon-database-edit2"></i>
                            </a>

                            <a href="javascript:void(0)" id="{{ $item->id  }}" data-user_type_id = "{{ $adminTypeId }}"
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
                    <th>Email</th>
                    <th>Status</th>
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