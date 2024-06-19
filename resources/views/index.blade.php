@extends('app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->title }}</p>
                            <small>author : {{ $post->username }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
