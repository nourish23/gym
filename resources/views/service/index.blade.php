@extends('layouts/contentNavbarLayout')

@section('title', 'Service')

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
                                {{ __('Service') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Image</th>
                                        <th>Text</th>
                                        <th>Price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $service->title }}</td>
                                            <td> <img src="{{ $service->image }}" width="100" alt=" "/></td>
                                            <td>{{ $service->text }}</td>
                                            <td>{{ $service->price }}</td>

                                            <td>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-flex justify-content-end">
                                                    <a class="btn btn-sm btn-primary me-1"
                                                        href="{{ route('services.show', $service->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success me-1"
                                                        href="{{ route('services.edit', $service->id) }}"><i
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
                        {!! $services->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
