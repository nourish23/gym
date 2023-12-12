@extends('layouts.main')

@section('head')
<title>Blog - Nourish Fitness</title>
<style>
    .posts-content {
        margin-top: 20px;
    }

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .default-style .ui-bordered {
        border: 1px solid rgba(24, 28, 33, 0.06);
    }

    .ui-bg-cover {
        background-color: transparent;
        background-position: center center;
        background-size: cover;
    }

    .ui-rect {
        height: 300px !important;
        position: relative !important;
        display: block !important;
        width: 100% !important;
    }

    .d-flex,
    .d-inline-flex,
    .media,
    .media>:not(.media-body),
    .jumbotron,
    .card {
        -ms-flex-negative: 1;
        flex-shrink: 1;
    }

    .bg-dark {
        background-color: rgba(24, 28, 33, 0.9) !important;
    }

    .card-footer,
    .card hr {
        border-color: rgba(24, 28, 33, 0.06);
    }

    .ui-rect-content {
        position: absolute !important;
        top: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
    }

    .description-container {
        height:auto;
        overflow: hidden;
    }

    .description-content {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .expanded .description-content {
        -webkit-line-clamp: unset;
    }

    .read-more-link {
        display: none;
    }

</style>
@endsection
@section('content')
@php $locale = App::getLocale(); @endphp
<!--  'title','seo_meta_title','seo_meta_text','seo_meta_keywords','image','description' -->
<div class="container posts-content">
    <div class="row" style="margin-top:10rem;">
        @forelse ($posts as $post)
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="description-container">
                        <div class="description-content">{{ $post->getTranslation('description', $locale) }}</div>
                        @if(strlen($post->getTranslation('description', $locale)) > 100)
                        <a href="#" class="read-more-link">Read More</a>
                        @endif
                    </div>
                    <img src="{{ asset($post->image) }}" class="ui-rect ui-bg-cover" alt="{{ $post->image }}">
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <p class="card-text">There are no posts!</p>
            </div>
        </div>
        @endforelse
    </div>
    <div class="row">
      <div class="col">
          {{ $posts->links() }} <!-- Pagination links -->
      </div>
  </div>
</div>

<script>
    var descriptionContainers = document.querySelectorAll('.description-container');

    descriptionContainers.forEach(function(container) {
        var content = container.querySelector('.description-content');
        var link = container.querySelector('.read-more-link');

        if (content.scrollHeight > content.clientHeight) {
            link.style.display = 'block';
        }

        link.addEventListener('click', function(e) {
            e.preventDefault();
            container.classList.toggle('expanded');
            if (container.classList.contains('expanded')) {
                link.textContent = 'Read Less';
            } else {
                link.textContent = 'Read More';
            }
        });
    });

</script>
@endsection
