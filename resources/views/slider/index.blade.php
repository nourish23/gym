@extends('layouts/contentNavbarLayout')

@section('title', 'Slider')

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
                                {{ __('Slider') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Title</th>
                                        <th>Image Url</th>
                                        <th>Text</th>
                                        <th>Is Clickable</th>
                                        <th>Target Blank</th>
                                        <th>Url</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $slider->title }}</td>
                                            <td>
                                                <img src="{{ $slider->image_url }}" width="70px" height="70px"
                                                    alt=" ">
                                            </td>
                                            <td>{{ str_limit($slider->text, $limit = 40, $end = '...') }}</td>
                                            <td>
                                                @if ($slider->is_clickable == 1)
                                                    <span class="text-success p-1 rounded-1">Yes</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($slider->target_blank == 1)
                                                    <span class="text-success p-1 rounded-1">Yes</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">No</span>
                                                @endif
                                            </td>
                                            <td>{{str_limit($slider->url, $limit = 20, $end = '...')  }}</td>
                                            <td>
                                                @if ($slider->status == 1)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-flex">
                                                    <a class="btn btn-sm btn-primary me-1"
                                                        href="{{ route('sliders.show', $slider->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success  me-1"
                                                        href="{{ route('sliders.edit', $slider->id) }}"><i
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
                    <div class="mx-auto my-4">
                        {!! $sliders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
