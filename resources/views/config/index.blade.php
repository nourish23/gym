@extends('layouts/contentNavbarLayout')

@section('title', 'Configs List')

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
                                {{ __('Config') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('configs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Type</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($configs as $config)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $config->title }}</td>
											<td>{{ $config->type }}</td>

                                            <td>
                                                <form action="{{ route('{configs}.destroy',$config->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('{configs}.show',$config->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('{configs}.edit',$config->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                        {!! $configs->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
