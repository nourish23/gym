@extends('layouts/contentNavbarLayout')

@section('title', 'Scheduled Class')

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
                                {{ __('Scheduled Class') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('scheduled-classes.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Plan Class </th>
                                        <th>Day </th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scheduledClasses as $scheduledClass)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                @if (is_null($scheduledClass->planClass))
                                                    {{ $scheduledClass->plan_class_id }}
                                                @else
                                                    {{ $scheduledClass->planClass->title }}
                                                @endif
                                            </td>
                                            <td>{{ $scheduledClass->day->name }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($scheduledClass->start_time)->setTimezone($timezone)->format('Y-m-d H:i:s') }}
                                            </td>
                                            <td>

                                                {{ \Carbon\Carbon::parse($scheduledClass->end_time)->setTimezone($timezone) }}
                                            </td>
                                            <td>
                                                @if ($scheduledClass->status == 1)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('scheduled-classes.destroy', $scheduledClass->id) }}"
                                                    method="POST" class="d-flex justify-content-end">
                                                    <a class="btn btn-sm btn-primary me-1 "
                                                        href="{{ route('scheduled-classes.show', $scheduledClass->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success  me-1"
                                                        href="{{ route('scheduled-classes.edit', $scheduledClass->id) }}"><i
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
                        {!! $scheduledClasses->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
