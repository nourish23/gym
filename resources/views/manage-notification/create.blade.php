@extends('layouts/contentNavbarLayout')

@section('title', 'Create Manage Notification')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/notification.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script>
        $(document).ready(function() {
            $('#user_id').select2();
        });
    </script>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Manage Notification</span>
                    </div>
                    <div class="card-body">
                        <form id="notification_form" action="{{ route('manage-notifications.send-notification') }}"
                            method="POST">
                            @csrf

                            <div class="form-group my-3">
                                <lable>Users Group </lable>
                               <select name="user_group" class="form-control">
                                   <option value="0">Please Select Group</option>
                                   <option value="1">Active Users </option>
                                   <option value="2">Inactive Users </option>
                                   <option value="3">All Users</option>
                               </select>

                            </div>


                            <div class="form-group my-3">
                                <label for="user_id">Select Users</label>
                                <select name="user_id[]" id="user_id" class="form-control" multiple>
                                    @foreach ($users as $id => $email)
                                        <option value="{{ $id }}">{{ $email }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="form-group my-3">
                                <label for="body">Body:</label>
                                <textarea id="body" name="body" class="form-control"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
