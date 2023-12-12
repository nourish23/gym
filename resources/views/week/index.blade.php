@extends('layouts/contentNavbarLayout')

@section('title', 'Week')

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
                                {{ __('Week') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('weeks.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($weeks as $week)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $week->title }}</td>
                                            <td>
                                                @if ($week->status)
                                                    <span class=" text-success">Enabled</span>
                                                @else
                                                    <span class=" text-danger">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('weeks.destroy', $week->id) }}" method="POST"
                                                    class="text-end">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('weeks.show', $week->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('weeks.edit', $week->id) }}"><i
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
                        {!! $weeks->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
