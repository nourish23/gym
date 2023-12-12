@extends('layouts.app')

@section('template_title')
    {{ $planClassesEquipment->name ?? "{{ __('Show') Plan Classes Equipment" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Plan Classes Equipment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('{planclassesequipments}.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Equipment Id:</strong>
                            {{ $planClassesEquipment->equipment_id }}
                        </div>
                        <div class="form-group">
                            <strong>Plan Class Id:</strong>
                            {{ $planClassesEquipment->plan_class_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
