@extends('layouts.app')

@section('content')
    @foreach($discussions as $discussion)
        <div class="card">
            @include('partials.header')
            <div class="card-body">
                {!! $discussion->title !!}
            </div>
        </div>

    @endforeach
    {{ $discussions->links() }}
@endsection
