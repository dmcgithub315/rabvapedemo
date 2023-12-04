@extends('layout.main')
@section('title', 'Welcome')
@section('style')
@endsection
@section('content')
    <ul>
        @foreach($posts as $post)
            <li>
                {{$post->post_title}} | {{\App\Helpers\PostMetaHelper::get_field($post->ID, 'price')}}
                <img src="{{\App\Helpers\PostMetaHelper::get_thumbnail_url($post->ID)}}" alt="" style="width: 50px; height: 50px;">
            </li>
        @endforeach
    </ul>
@endsection
