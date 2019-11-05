@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">
            <form action="{{ route('discussion.store') }} @method('POST')">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>

                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>

                </div>

                <div class="form-group">
                    <label for="channel">Channels</label>
                    <select name="cahnnel" id="channel" class="form-control">
                        <option selected>select channel</option>
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-sm" type="submit">Create Discussion</button>
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
