@extends('layouts/contentNavbarLayout')

@section('title', 'Create Email Template')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/email-template.js') }}"></script>
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
                        <span class="card-title">{{ __('Create') }} Email Template</span>
                    </div>
                    <div class="card-body">
                        <form id="email_template_form" method="POST" action="{{ route('email-templates.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">Select Users</label>
                                <select name="user_id[]" id="user_id" class="form-control" multiple>
                                    @foreach ($users as $id => $email)
                                        <option value="{{ $id }}">{{ $email }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary  mt-4">Send Email</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
