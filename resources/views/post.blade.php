@extends('layouts.main')
@php $locale = App::getLocale(); @endphp
@section('head')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $post->getTranslation('title', $locale,true) }}</title>

  <meta name="description" content="{{ $post->getTranslation('seo_meta_text', $locale,true) }}" />
@endsection
@section('content')

  <section style="padding-top:100px">
  <div class="container my-4">
    <h1 class="mb-3">{{ $post->getTranslation('title', $locale,true) }}</h1>
    <!--
    <p class="text-muted">{{$post->getTranslation('title', $locale,true) }}</p> -->
    <div class="w-50 my-3">
      <img src="{{ $post->image }}" alt="{{ $post->image }}" class="img-fluid" />
    </div>
    <div class="overflow-hidden">
      {!! $post->getTranslation('description', $locale,true) !!}
    </div>
  </div>
</section>
@endsection