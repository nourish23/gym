@extends('layouts.contentNavbarLayout')

@section('template_title')
    Nutrition Plan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nutrition Plan') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('nutrition-plans.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Body Measurement Id</th>
										<th>Plan Id</th>
										<th>Day Id</th>
										<th>Meal</th>
										<th>Time Of Meal</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nutritionPlans as $nutritionPlan)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $nutritionPlan->user_id }}</td>
											<td>{{ $nutritionPlan->body_measurement_id }}</td>
											<td>{{ $nutritionPlan->plan_id }}</td>
											<td>{{ $nutritionPlan->day_id }}</td>
											<td>{{ $nutritionPlan->meal }}</td>
											<td>{{ $nutritionPlan->time_of_meal }}</td>
											<td>{{ $nutritionPlan->status }}</td>

                                            <td>
                                                <form action="{{ route('nutrition-plans.destroy',$nutritionPlan->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('nutrition-plans.show',$nutritionPlan->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('nutrition-plans.edit',$nutritionPlan->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                        {!! $nutritionPlans->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
