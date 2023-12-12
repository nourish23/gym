@extends('layouts/contentNavbarLayout')

@section('title', 'Posts')

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
                                {{ __('Post') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Seo Meta Title</th>
                                        <th>Seo Meta Text</th>
                                        <th>Seo Meta Keywords</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->seo_meta_title }}</td>
                                            <td>{{ $post->seo_meta_text }}</td>
                                            <td>{{ $post->seo_meta_keywords }}</td>
                                            <td>
                                                <img src="{{ $post->image }}" width="70px" height="70px"
                                                    alt=" ">
                                            </td>
                                            <td>{{ str_limit($post->description, $limit = 40, $end = '...') }}</td>
                                            <td>
                                                @if ($post->status == 1)
                                                    <span class="text-success p-1 rounded-1">Enabled</span>
                                                @else
                                                    <span class="text-danger p-1 rounded-1">Disenabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-flex ">
                                                    <a class="btn btn-sm btn-primary me-1"
                                                        href="{{ route('posts.show', $post->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success me-1"
                                                        href="{{ route('posts.edit', $post->id) }}"><i
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
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
