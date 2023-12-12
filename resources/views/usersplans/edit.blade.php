@extends('layouts/contentNavbarLayout')

@section('title', 'Update User')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/validation/user.js') }}"></script>
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User</span>
                    </div>
                    <div class="card-body">
                        <p>Start Date : {{date('Y-m-d', strtotime($user->subscription_start_date))}}</p>
                        <p>End Date : {{date('Y-m-d', strtotime($user->subscription_end_date))}}</p>
                        <form id="user_form" method="POST" action="{{ route('usersplans.update', $user->id) }}"
                              role="form"
                              enctype="multipart/form-data">
                            {{ method_field('POST') }}
                            @csrf

                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Subscription Period Extend</label>
                                        <select class="form-control" name="plan" style="margin-top: 20px">
                                            <option value="{{$user->plan_id}}">{{$user_cat->title}}
                                                - {{$user_plan->title}}</option>

                                            @foreach($plans as $plan)
                                                @if($user->plan_id == $plan->id)
                                                @else

                                                    @php
                                                        $cat=\App\Models\Category::where('id',$plan->category_id)->first();
                                                    @endphp
                                                    <option value="{{$plan->id}}">{{$cat->title}}
                                                        - {{$plan->title}}</option>

                                                @endif
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-group col-4" style="margin-top: 20px">
                                        <label>New Start Date</label>
                                        <input class="form-control" name="subscription_start_date" placeholder="{{$user->subscription_start_date}}" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />

                                    </div>


                                    <div class="form-group col-4" style="margin-top: 20px">
                                        <label>New End Date</label>
                                        <input class="form-control" name="subscription_end_date" placeholder="{{$user->subscription_end_date}}" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2" />

                                    </div>




                                    <div class="form-group col-6" style="margin-top: 20px">
                                        <label>Active</label>
                                        <select class="form-control" name="is_active">
                                            <option value="{{$user->is_active}}">@if($user->is_active == 1)
                                                    {{'Active'}}
                                                @else
                                                    {{'InActive'}}
                                                @endif</option>
                                            @if($user->is_active == 1)
                                                <option value="0">InActive</option>
                                            @else
                                                <option value="1">Active</option>
                                            @endif

                                        </select>
                                    </div>

                                    <div class="form-group col-6" style="margin-top: 20px">
                                        <label>Paid</label>
                                        <select class="form-control" name="is_paid">
                                            <option value="{{$user->is_paid}}">@if($user->is_paid == 1)
                                                    {{'Paid'}}
                                                @else
                                                    {{'UnPaid'}}
                                                @endif</option>
                                            @if($user->is_paid == 1)
                                                <option value="0">UnPaid</option>
                                            @else
                                                <option value="1">Paid</option>
                                            @endif

                                        </select>
                                    </div>

                                    <div class="form-group col-6" style="margin-top: 20px;padding-top: 20px">
                                        <label></label>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Update">
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
