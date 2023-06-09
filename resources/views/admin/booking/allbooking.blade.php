@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Booking Message All</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Booking Message</h4> <br>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Event</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Ticket</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($bookings as $item)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td>
                                                <p>{!! Str::limit($item->event->name, 20) !!}</p>
                                            </td>
                                            <td> {{ $item->name }} </td>
                                            <td> {{ $item->email }} </td>
                                            <td> {{ $item->phone_number }} </td>
                                            <td> {{ $item->number_of_tickets }} </td>
                                            <td>
                                                <p>{!! Str::limit($item->description, 30) !!}</p>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</td>
                                            <td>
                                                <a href="{{ route('delete.booking', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
