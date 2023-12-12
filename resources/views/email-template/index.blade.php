@extends('layouts/contentNavbarLayout')

@section('title', 'Email Template')

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
                                {{ __('Email Template') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('email-templates.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emailTemplates as $emailTemplate)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $emailTemplate->subject }}</td>
                                            <td>{{ $emailTemplate->content }}</td>
                                            <td>{{ $emailTemplate->user->email }}</td>
                                            <td>
                                                <form action="{{ route('email-templates.destroy', $emailTemplate->id) }}" method="POST"
                                                    class="text-end">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mx-auto my-4">
                        {!! $emailTemplates->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
