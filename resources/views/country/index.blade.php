@extends('layouts/contentNavbarLayout')

@section('title', 'Countries')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card d-flex flex-column ">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Country') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Flag Url</th>
                                        <th>Phone Code</th>
                                        <th>Phone Length</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $country->name }}</td>
                                            <td>{{ $country->code }}</td>
                                            <td> <img src="{{ $country->flag_url }}" width="70px" height="70px"
                                                alt=" "> </td>
                                            <td>{{ $country->phone_code }}</td>
                                            <td>{{ $country->phone_length }}</td>
                                            <td>
                                                @if ($country->status)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('countries.destroy', $country->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('countries.show', $country->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('countries.edit', $country->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                        {!! $countries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
