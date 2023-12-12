@extends('layouts/contentNavbarLayout')

@section('title', 'Notifications')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Manage Notification') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('manage-notifications.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>uri_string</th>
                                        <th>sent_time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($n as $manageNotification)
                                        @php
                                            $data = json_decode($manageNotification->data);
                                        @endphp
                                        <tr>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->body }}</td>
                                            <td>{{ $data->uri_string }}</td>
                                            <td>{{ $data->sent_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mx-auto my-4">
                        {{-- {!! $manageNotifications->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
