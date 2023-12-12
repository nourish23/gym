@extends('layouts/contentNavbarLayout')

@section('title', User Plan Request)

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User Plan Request') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('{userplanrequests}.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>User Id</th>
										<th>Plan Id</th>
										<th>Notes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userPlanRequests as $userPlanRequest)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $userPlanRequest->user_id }}</td>
											<td>{{ $userPlanRequest->plan_id }}</td>
											<td>{{ $userPlanRequest->notes }}</td>

                                            <td>
                                                <form action="{{ route('{userplanrequests}.destroy',$userPlanRequest->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('{userplanrequests}.show',$userPlanRequest->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('{userplanrequests}.edit',$userPlanRequest->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mx-auto my-4">
                        {!! $userPlanRequests->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
