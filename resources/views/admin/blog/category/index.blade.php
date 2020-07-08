@extends('layouts.admin.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".categoryTable").on("click", ".change-status", function () {
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
                            url: "{{ route('admin.blog.category.change-status') }}",
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

            $(".categoryTable").on("click", ".delete", function () {
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
                            url: rootUrl + "/admin/blog/category" + "/" + id,
                            data: {
                                id: id,
                                _method: 'DELETE'
                            },
                            success: function (response) {
                                swal("Deleted!", response.message, "success");
                                $object.parent().parent().remove();
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
                    Blog Category</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Blog Category</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Blog Category</h5>
            <div class="heading-elements">
                <a href="{{ route('admin.blog.category.create') }}" class="btn btn-default legitRipple pull-right">
                    <i class="icon-file-plus position-left"></i>
                    Create New
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table categoryTable">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>


                @if(count($categories)>0)
                    @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="javascript:void(0)"
                                   class="btn btn-primary btn-icon btn-rounded legitRipple change-status"
                                   id="{{ $category->id }}">
                                    @if($category->is_active == 1)
                                        <i class="icon-checkmark3"></i>
                                    @else
                                        <i class="icon-minus2"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.blog.category.edit',$category->id) }}"
                                   class="btn btn-success btn-icon btn-rounded legitRipple">
                                    <i class=" icon-database-edit2"></i>
                                </a>
                                <a href="javascript:void(0)" id="{{ $category->id  }}"
                                   class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                    <i class="icon-cross2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No record found</td>
                    </tr>
                @endif

                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection