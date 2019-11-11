@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">
            <form action="{{ route('discussions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="contnt">Content</label>

                    <input id="contnt" type="hidden" name="contnt">
                    <trix-editor input="contnt"></trix-editor>

                </div>

                <div class="form-group">
                    <label for="channel">Channels</label>
                    <select name="channel" id="channel" class="form-control">
                        <option selected disabled>select channel</option>
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-sm" type="submit" >Create Discussion</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
