
@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Event All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Event All Data</h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Event Name</th>
                                        <th>Event Date</th>
                                        <th>Event Location</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($events as $event)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $event->name }} </td>
                                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y g:i A') }}</td>
                                            <td> {{ $event->location }} </td>

                                            <td>
                                                <a href=" {{ route('events.edit', $event->id) }} " class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="   {{ route('delete.event', $event->id) }}" class="btn btn-danger sm"
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
