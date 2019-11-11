<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img width="40px" height="40px" style="border-radius:50%"
                 src="{{ Gravatar::src($discussion->auther->email) }}">
            <strong class="ml-2">
                {{ $discussion->auther->name }}
            </strong>
        </div>
        <div>
            <a class="btn-info btn-sm " href="{{route('discussions.show',$discussion->slug)}}">view</a>
        </div>
    </div>
</div>
