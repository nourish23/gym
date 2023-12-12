@extends('layouts/contentNavbarLayout')

@section('title', 'List')

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
                                {{ __('Body Measurement') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('body-measurements.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Chest</th>
                                        <th>Waist</th>
                                        <th>Abs</th>
                                        <th>Hips</th>
                                        <th>Left Thigh</th>
                                        <th>Right Thigh</th>
                                        <th>Left Arm</th>
                                        <th>Right Arm</th>
                                        <th>User Id</th>

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
                                            <td>{{ $bodyMeasurement->user_id }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('body-measurements.destroy', $bodyMeasurement->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('body-measurements.show', $bodyMeasurement->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('body-measurements.edit', $bodyMeasurement->id) }}"><i
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
                {!! $bodyMeasurements->links() !!}
            </div>
        </div>
    </div>
@endsection
