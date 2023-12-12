@extends('layouts/contentNavbarLayout')

@section('title', 'Equipments List')

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
                                {{ __('Equipment') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('equipments.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Additional Info</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipments as $equipment)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $equipment->name }}</td>
                                            <td>{{ $equipment->additional_info }}</td>
                                            <td>
                                                @if ($equipment->status)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('equipments.destroy', $equipment->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('equipments.show', $equipment->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('equipments.edit', $equipment->id) }}"><i
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
                        {!! $equipments->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
