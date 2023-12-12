@extends('layouts/contentNavbarLayout')

@section('title', 'Body Measurements ')

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
                        <span id="d-flex card_title ">

                            @if ($bodyMeasurements->isEmpty())
                            <span>{{ __('Body Measurements') }}</span>
                            @else
                            <span class=" fw-bold fs-5">
                                {{ $bodyMeasurements[0]->user->first_name . ' ' . $bodyMeasurements[0]->user->last_name . ' ' }}
                            </span>
                            <span>{{ __('body measurements') }}</span>
                            @endif
                        </span>


                        <div class="float-right d-flex">
                            {{-- <a href="{{ route('users.nutrition.plan', $bodyMeasurements[0]->user_id) }}"
                            class="btn btn-primary btn-sm float-right" data-placement="left">
                            Nutrition Plans
                            </a> --}}
                            <a class="btn btn-primary  btn-sm me-2 " href="{{ route('users.index') }}">
                                {{ __('Back') }}</a>

                            <a href="{{ route('body.measurements.create', request()->id) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            {{-- <a href="{{ route('nutrition.plan.create', $bodyMeasurements[0]->user_id) }}"
                            class="btn btn-primary btn-sm float-right" data-placement="left">
                            Add Nutrition Plan
                            </a> --}}
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">

                    @if ($bodyMeasurements->isEmpty())
                    <h4 class=" text-center">There are no body measurements add yet!</h4>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Weight (kg)</th>
                                    <th>Height (cm)</th>
                                    <th>Chest (cm)</th>
                                    <th>Waist (cm)</th>
                                    <th>Abs </th>
                                    <th>Hips (cm)</th>
                                    <th>Left Thigh (cm)</th>
                                    <th>Right Thigh (cm)</th>
                                    <th>Left Arm (cm)</th>
                                    <th>Right Arm (cm)</th>
                                    <th>Created At</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bodyMeasurements as $bodyMeasurement)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $bodyMeasurement->weight }}</td>
                                    <td>{{ $bodyMeasurement->height }}</td>
                                    <td>{{ $bodyMeasurement->chest }}</td>
                                    <td>{{ $bodyMeasurement->waist }}</td>
                                    <td>{{ $bodyMeasurement->abs }}</td>
                                    <td>{{ $bodyMeasurement->hips }}</td>
                                    <td>{{ $bodyMeasurement->left_thigh }}</td>
                                    <td>{{ $bodyMeasurement->right_thigh }}</td>
                                    <td>{{ $bodyMeasurement->left_arm }}</td>
                                    <td>{{ $bodyMeasurement->right_arm }}</td>
                                    <td>{{ $bodyMeasurement->created_at }}</td>
                                    <td>
                                        <form action="{{ route('body-measurements.destroy', $bodyMeasurement->id) }}" method="POST" class="d-flex flex-nowrap">
                                            <a class="btn btn-sm btn-primary me-1 " href="{{ route('body-measurements.show', $bodyMeasurement->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success me-1" href="{{ route('body-measurements.edit', $bodyMeasurement->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                    @endif
                </div>
                <div class="mx-auto my-4">
                    {!! $bodyMeasurements->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
