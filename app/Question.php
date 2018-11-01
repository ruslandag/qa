<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    protected $fillable=['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=str_slug($value);
    }
    
    public function setUserIdAttribute($value){
        $this->attributes['user_id']=$value;
    }

    public function getUrlAttribute(){
        return route('question.show', $this->slug);
    }
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

}
