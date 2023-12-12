@extends('layouts/contentNavbarLayout')

@section('title', 'Meal')

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
                                <strong>{{ $user->full_name . ' ' }}</strong> {{ __('Meal') }}
                            </span>

                            <div class="float-right">
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-sm me-2 " href="{{ route('users.index') }}">
                                        {{ __('Back') }}</a>
                                    <a href="{{ route('meal.creation', $user->id) }}" class="btn btn-primary btn-sm  me-2"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                    <a href="{{ route('users.nutrition.plan', $user->id) }}" class="btn btn-primary btn-sm "
                                        data-placement="left">
                                        {{ __('Nutrition Plan') }}
                                    </a>
                                </div>
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
                                        <th>Time</th>
                                        <th>Week </th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meals as $meal)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $meal->title }}</td>
                                            <td> {{ date('h:i a', strtotime($meal->time)) }}</td>
                                            <td>{{ $meal->week->title }}</td>
                                            <td>
                                                @if ($meal->status == 1)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('meals.destroy', $meal->id) }}" method="POST"
                                                    class="text-end">
                                                    {{-- <a class="btn btn-sm btn-primary "
                                                        href="{{ route('data.meals.creation', $meal->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Add meal data') }}</a> --}}
                                                    <a class="btn btn-sm btn-success "
                                                        href="{{ route('meals.show', $meal->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    {{-- <a class="btn btn-sm btn-success"
                                                        href="{{ route('meals.edit', $meal->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mx-auto my-4">
                        {!! $meals->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
