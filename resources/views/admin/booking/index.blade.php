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
                    var url = "{{ url('admin/banner/sort') }}";
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
                            url: "{{ route('admin.booking.change-status') }}",
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


        });
    </script>
@endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Banners</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Banners</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Banners</h5>
            <div class="heading-elements">

            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>email</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Book</th>

                </tr>
                </thead>
                <tbody id="sortable">


                @foreach($bookings as $key=>$booking)
                    <tr id="item-{{ $booking->id }}">

                        <td>{{ $key  + $bookings->firstItem()}}</td>
                        <td>
                            {{$booking->first_name}} {{$booking->last_name}}
                        </td>
                        <td>{{$booking->room->name}}</td>
                        <td>{{$booking->phone}}</td>
                        <td>{{$booking->address}}</td>
                        <td>{{$booking->email}}</td>
                        <td>{{$booking->check_in}}</td>
                        <td>{{$booking->check_out}}</td>
                        <td>
                            @can('master-policy.perform', ['booking', 'changeStatus'])
                                <a href="javascript:void(0)"
                                   title="Booking-confirmation"
                                   data-toggle="tooltip"
                                   class="btn btn-primary btn-icon btn-rounded legitRipple change-status"
                                   id="{{ $booking->id }}">
                                    @if($booking->is_active == 1)
                                        <i class="icon-checkmark3"></i>
                                    @else
                                        <i class="icon-minus2"></i>
                                    @endif
                                </a>
                            @endif
                        </td>

                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>email</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Book</th>

                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection