@extends('layouts/contentNavbarLayout')

@section('title',   Page)

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
                                {{ __('Page') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('{pages}.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Description</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $page->title }}</td>
											<td> {{ str_limit($page->description, $limit = 40, $end = '...') }}</td>
											<td>{{ $page->status }}</td>
                                           
                                            <td>
                                                <form action="{{ route('{pages}.destroy',$page->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('{pages}.show',$page->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('{pages}.edit',$page->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                        {!! $pages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
