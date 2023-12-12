@extends('layouts/contentNavbarLayout')

@section('title', 'Users')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection


@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>



    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Users Plans') }}
                            </span>


                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive pb-4">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Plan</th>
                                    <th>Subscription Start</th>
                                    <th>Subscription End</th>
                                    <th>Active</th>
                                    <th>Paid</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @php
                                        $plan=\App\Models\Plan::where('id',$user->plan_id)->first();
                                        $cat=\App\Models\Category::where('id',$plan->category_id)->first();

                                    @endphp
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td> {{$cat->title}} (     {{$plan->title}}  )</td>
                                        <td> {{date('Y-m-d', strtotime($user->subscription_start_date))}}</td>
                                        <td> {{date('Y-m-d', strtotime($user->subscription_end_date))}}</td>
                                        <td>
                                            @if($user->is_active == 1) Active @else Inactive @endif
                                        </td>
                                        <td>
                                            @if($user->is_paid == 1) Paid @else Unpaid @endif

                                        </td>
                                        <td>
                                            <a href="{{url('admin/users-plans-edit',$user->id)}}" class="btn btn-secondary" >Edit </a>

                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
@endsection

