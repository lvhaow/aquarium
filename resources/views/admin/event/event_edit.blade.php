@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Event Edit Page </h4>

                            <form method="post" action="{{ route('update.event') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text" id="example-text-input"
                                            value=" {{ $event->name }} ">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Description
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="description" class="form-control" type="text"
                                            id="example-text-input" value=" {{ $event->description }} ">

                                        @error('description')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Start Data:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="start_date" class="form-control" type="datetime-local" id="start_date"
                                            value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">End Data:
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="end_date" class="form-control" type="datetime-local" id="end_date"
                                            value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Location
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="location" class="form-control" type="text" id="location" value=" {{ $event->location }} ">
                                    </div>
                                </div>


                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Image</label>
                                    <div class="col-sm-10">
                                        <input name="event_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($event->event_image) }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Insert Event Data">
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
