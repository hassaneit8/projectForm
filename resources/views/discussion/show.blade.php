@extends('layouts.app')

@section('content')
    <div class="card">
      @include('partials.header')
        <div class="card-body">
            {!! $discussion->title !!}
            <hr>
            {!! $discussion->contnt !!}
        </div>
    </div>
@endsection
