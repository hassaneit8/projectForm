@extends('layouts.app')

@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="card">
        @include('partials.header')
        <div class="card-body">
            {!! $discussion->title !!}
            <hr>
            {!! $discussion->contnt !!}

            <div class="card bg-success my-3" style="color: white" >
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40ps" style="border-radius: 60%" class="mr-2"
                                 src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="">
                            <strong>
                                {{ $discussion->bestReply->owner->name }}
                            </strong>
                        </div>

                        <div>
                            <strong>
                                Best Reply
                            </strong>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        {!!   $discussion->bestReply->contnt !!}
                    </div>
                </div>
            </div>
        </div>
        @foreach($discussion->replies()->paginate(3) as $reply)
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="30px" height="30px" style="border-radius:20%"
                                 src="{{Gravatar::src($reply->owner->email)}}" alt="">
                            <span>{{$reply->owner->name}}</span>
                        </div>
                        @if(auth()->user()->id==$discussion->user_id)
                            <form
                                action="{{ route('discussions.mark-as-best',['discussion'=>$discussion->slug,'reply'=>$reply->id]) }}"
                                method="post">
                                @csrf
                                <button class="btn btn-sm btn-primary" type="submit">Make Best Reply</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {!!$reply->contnt!!}
                </div>
            </div>

        @endforeach
        {{ $discussion->replies()->paginate(3)->links() }}


        <div class="card my-5">
            <div class="card-header">
                Add reply
            </div>
            <div class="card-body">
                @auth
                    <form action="{{ route('replies.store',$discussion->slug) }}" method="post">
                        @csrf
                        <input type="hidden" name="contnt" id="contnt">
                        <trix-editor input="contnt"></trix-editor>
                        <button class="btn btn-info my-2 btn-sm" type="submit">
                            Create reply
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="btn btn-info"> sign in to add reply</a>
                @endauth
            </div>
        </div>
        @endsection


        @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
        @endsection
        @section('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
