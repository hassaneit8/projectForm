<?php

namespace LaravelForm;


class Discussion extends Model
{
//    public function user(){
//      return  $this->belongsTo(User::class); if we use   <img src="{{ Gravatar::src($discussion->user->email) }}">
//    }

    public function auther()
    {
        return $this->belongsTo(User::class, 'user_id'); # the same effect ot the above     <img src="{{ Gravatar::src($discussion->auther->email) }}">
    }

    public function getRouteKeyName()
    {
        return 'slug'; //  use the slug instead of id in show method
    }
}
