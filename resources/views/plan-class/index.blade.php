@extends('layouts/contentNavbarLayout')

@section('title', 'Classes List')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Plan Class') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('planclasses.create') }}" class="btn btn-primary btn-sm float-right"
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
                            <table id="example" class="display" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Title</th>

                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Class Type</th>
                                        <th>Color</th>
                                        <th>Burn Rate</th>
                                        <th>Coache Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $i=0;

                                @endphp
                                    @foreach ($planClasses as $planClass)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $planClass->title }}</td>

                                            <td>{{ str_limit($planClass->description, $limit = 40, $end = '...') }}</td>
                                            <td>
                                                @if ($planClass->status == 1)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>
                                            <td>{{ $planClass->class_type ? 'Recorded' : 'Not-Recorded' }}</td>
                                            <td>{{ $planClass->color }}</td>
                                            <td>{{ $planClass->burn_rate }}</td>
                                            <td>
                                                @if (is_null($planClass->coach))
                                                    {{ $planClass->coache_id }}
                                                @else
                                                    {{ $planClass->coach->name }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('planclasses.destroy', $planClass->id) }}"
                                                    method="POST" class=" d-flex justify-content-end">
                                                    <a class="btn btn-sm btn-primary me-1 "
                                                        href="{{ route('planclasses.show', $planClass->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success  me-1 "
                                                        href="{{ route('planclasses.edit', $planClass->id) }}"><i
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

                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
@endsection
