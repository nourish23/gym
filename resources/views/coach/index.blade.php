@extends('layouts/contentNavbarLayout')

@section('title', 'Coach List')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card  d-flex flex-column">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Coach') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('coachs.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Brief</th>
                                        <th>Description</th>
                                        <th>Image Url</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coaches as $coach)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $coach->name }}</td>
                                            <td>{{ str_limit($coach->brief, $limit = 30, $end = '...') }}</td>
                                            <td>{{ str_limit($coach->description, $limit = 30, $end = '...') }}</td>
                                            <td>
                                                <img src="{{ $coach->image_url }}" width="70px" height="70px"
                                                    alt=" ">
                                            </td>
                                            <td>
                                                <form action="{{ route('coachs.destroy', $coach->id) }}" method="POST"
                                                    class=" d-flex flex-nowrap">
                                                    <a class="btn btn-sm btn-primary  me-1"
                                                        href="{{ route('coachs.show', $coach->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                        </a>
                                                    <a class="btn btn-sm btn-success me-1"
                                                        href="{{ route('coachs.edit', $coach->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
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
                        {!! $coaches->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
