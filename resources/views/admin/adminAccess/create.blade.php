@extends('layouts.admin.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#validator')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        title: {
                            validators: {
                                notEmpty: {
                                    message: 'The title is required'
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                }
                            }
                        },

                    }
                })
        });
    </script>

    <script>
        $(function(){
            $(".view-check-all").click(function(){
                $(".view-check").prop('checked', $(this).prop("checked"));
            });

            $(".add-check-all").click(function(){
                $(".add-check").prop('checked', $(this).prop("checked"));
            });

            $(".edit-check-all").click(function(){
                $(".edit-check").prop('checked', $(this).prop("checked"));
            });

            $(".delete-check-all").click(function(){
                $(".delete-check").prop('checked', $(this).prop("checked"));
            });

            $(".status-check-all").click(function(){
                $(".status-check").prop('checked', $(this).prop("checked"));
            });
        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Admin Access</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">User Access</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Update Admin Access</h5>

        </div>
        <div class="panel-body">

            <form method="post" action="{{ route('admin.admin-access.store',[$adminType->id]) }}">
                <input type="submit" value="Submit" class="btn btn-primary pull-right">
                <table class="table table-striped">
                    <thead>
                    <th width="25%">Module</th>
                    <th width="15%">View</th>
                    <th width="15%">Add</th>
                    <th width="15%">Edit</th>
                    <th width="15%">Delete</th>
                    <th width="15%">Change Status</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input-styled view-check-all">
                                    Check All
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input-styled add-check-all">
                                    Check All
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input-styled edit-check-all">
                                    Check All
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input-styled delete-check-all">
                                    Check All
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input-styled status-check-all">
                                    Check All
                                </label>
                            </div>
                        </td>
                    </tr>
                    @foreach($module as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="view[{{ $item->id }}]" class="form-check-input-styled view-check" {{ (isset($access) && isset($access[$item->id]) && isset($access[$item->id][0]) && $access[$item->id][0]['view'] == 1) ? "checked" : "" }}>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="add[{{ $item->id }}]" class="form-check-input-styled add-check" {{ (isset($access) && isset($access[$item->id]) && isset($access[$item->id][0]) && $access[$item->id][0]['add'] == 1) ? "checked" : "" }}>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="edit[{{ $item->id }}]" class="form-check-input-styled edit-check" {{ (isset($access) && isset($access[$item->id]) && isset($access[$item->id][0]) && $access[$item->id][0]['edit'] == 1) ? "checked" : "" }}>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="delete[{{ $item->id }}]" class="form-check-input-styled delete-check" {{ (isset($access) && isset($access[$item->id]) && isset($access[$item->id][0]) && $access[$item->id][0]['delete'] == 1) ? "checked" : "" }}>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="changeStatus[{{ $item->id }}]" class="form-check-input-styled status-check" {{ (isset($access) && isset($access[$item->id]) && isset($access[$item->id][0]) && $access[$item->id][0]['changeStatus'] == 1) ? "checked" : "" }}>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! csrf_field() !!}
            </form>

        </div>
    </div>
@endsection