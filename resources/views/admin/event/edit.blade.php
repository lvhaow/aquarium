@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Event Page </h4> <br><br>

                            <form method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Name: </label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text" id="name" value="{{ $event->name }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Description:
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="description">
                                            {{ $event->description }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Start Date: </label>
                                    <div class="col-sm-10">
                                        <input name="start_date" class="form-control" type="datetime-local" id="start_date" value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">End Date: </label>
                                    <div class="col-sm-10">
                                        <input name="end_date" class="form-control" type="datetime-local" id="end_date" value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Location: </label>
                                    <div class="col-sm-10">
                                        <input name="location" class="form-control" type="text" id="location" value="{{ $event->location }}">
                                    </div>
                                </div>


                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Event Data">
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
@endsection
