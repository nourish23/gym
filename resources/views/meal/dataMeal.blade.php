     <div class="col-sm-12">
         <div class="card">
             <div class="card-header">
                 <div style="display: flex; justify-content: space-between; align-items: center;">

                     <span id="card_title">
                         <strong>{{$meal->title}}</strong> {{ __('Data Meal') }}
                     </span>

                     {{--  <div class="float-right">
                         <a href="{{ route('data.meals.creation', $meal->id) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                             {{ __('Create New') }}
                         </a>
                     </div>  --}}
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

                                 <th>Body</th>
                                 <th>Day</th>
                                 <th>Status</th>

                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($dataMeals as $dataMeal)
                             <tr>
                                 <td>{{ ++$i }}</td>

                                 <td>{{ $dataMeal->body }}</td>
                                 <td>{{ $dataMeal->day->name }}</td>
                                 <td>
                                     @if ($dataMeal->status == 1)
                                     <span class="text-success p-1 rounded-1">Enabled</span>
                                     @else
                                     <span class="text-danger p-1 rounded-1">Disenabled</span>
                                     @endif
                                 </td>

                                 <td>
                                     <form action="{{ route('data-meals.destroy', $dataMeal->id) }}" method="POST" class="text-end">
                                         {{-- <a class="btn btn-sm btn-primary "
                                                href="{{ route('data-meals.show', $dataMeal->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                         <a class="btn btn-sm btn-success" href="{{ route('data-meals.edit', $dataMeal->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                         @csrf
                                         @method('DELETE')
                                         {{--  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>  --}}
                                     </form>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
             <div class="d-flex justify-content-center my-3">
                 {!! $dataMeals->links() !!}
             </div>
         </div>
     </div>
