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

                            <span id="card_title" class=" h5">
                                @if ($weekCount != 0)
                                    <strong> {{ $weekMeals[0]->week->title }}</strong> nutrition plan
                                @endif
                            </span>

                            <div class="float-right">
                                <a href="{{ route('users.meals', $userID) }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                            </a>

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body mb-1">
                        @if ($weekCount == 0)
                            <div class=" text-center">There are no nutrition plans added yet!</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">

                                    <thead class="thead">
                                        <tr>
                                            <th class="text-center align-middle">Day</th>
                                            @foreach ($weekMeals as $meal)
                                                <th class="text-center align-middle">{{ $meal->title }} <br>
                                                    {{ date('h:i a', strtotime($meal->time)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($days as $day)
                                            <tr>
                                                <td class=" fw-bold">{{ $day->name }}</td>
                                                @foreach ($weekMeals as $meal)
                                                    @php
                                                        $mealData = $meal->dataMeals->firstWhere('day_id', $day->id);
                                                     @endphp
                                                    <td class="text-center">{{ $mealData ? $mealData->body : '-' }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        {!! $weeks->links() !!}
                        </div> 
                    @endif
                </>
            </div>
        </div>
    </div>
@endsection
