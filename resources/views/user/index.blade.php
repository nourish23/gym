@extends('layouts/contentNavbarLayout')

@section('title', 'Users')

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
                                {{ __('Users') }}
                            </span>

                            <div class="float-right">
                                @if (request()->has('filter'))
                                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Back') }}
                                    </a>
                                @endif
                                <a href="{{ url('/admin/users?filter=subscriptions') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Filter') }}
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
                        <div class="table-responsive pb-4">
                            <table class="table table-striped table-hover pt-3" id="users-table">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>start Date</th>
                                        <th>End Date</th>
                                        <th>Is Active</th>
                                        <th>Is Paid</th>

                                        <th></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
