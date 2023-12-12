@extends('layouts/contentNavbarLayout')

@section('title', 'Plan')

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
                                {{ __('Plan') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('plans.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Is Free</th>
                                        <th>Price</th>
                                        <th>Period</th>
                                        <th>Category Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $plan->title }}</td>
                                            <td>
                                                @if ($plan->is_free == 1)
                                                    <span class="text-success p-1 rounded-1">Free</span>
                                                @else
                                                    <span class="text-primary p-1 rounded-1">Paid</span>
                                                @endif
                                            </td>
                                            <td>{{ $plan->price }}</td>
                                            <td>{{ $plan->period }}</td>
                                            <td>{{ $plan->category->title }}</td>

                                            <td>
                                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-flex justify-content-end">
                                                    <a class="btn btn-sm btn-primary me-1 "
                                                        href="{{ route('plans.show', $plan->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success me-1"
                                                        href="{{ route('plans.edit', $plan->id) }}"><i
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
                        {!! $plans->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
