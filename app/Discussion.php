<?php

namespace LaravelForm;



class Discussion extends Model
{
    public function user(){
      return  $this->belongsTo(User::class);
    }
}
