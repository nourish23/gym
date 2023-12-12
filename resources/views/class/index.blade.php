@extends('layouts/contentNavbarLayout')

@section('title', 'Classes List')

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
                                {{ __('Classes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('class.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Thumbnail Url</th>
                                        <th>Title</th>
                                        <th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $class)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                           
                                            <td>
                                                @if (is_null($class->thumbnail_url))
                                                    -
                                                @else
                                                    <img src="{{ $class->thumbnail_url }}" width="70px" height="70px"
                                                        alt=" ">
                                                @endif
                                            </td>
                                            <td>{{ $class->title }}</td>
                                            </td>
                                            <td>{{ str_limit($class->description, $limit = 40, $end = '...') }}</td>
                                            
                                            <td>
                                                <form action="{{ route('class.destroy', $class->id) }}"
                                                    method="POST" class=" d-flex justify-content-end">
                                                    <a class="btn btn-sm btn-primary me-1 "
                                                        href="{{ route('class.show', $class->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success  me-1 "
                                                        href="{{ route('class.edit', $class->id) }}"><i
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
                        {!! $classes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
