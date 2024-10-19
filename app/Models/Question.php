<?php
 namespace App\Models;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Facades\Session; 
 class Question extends Model { 
  protected $table = 'question'; 
 public $timestamps=false; 
 protected $fillable = [ 
 'questionBody','questionType','questionStatus','entityObjectOrder' 
 ]; 
 public static function boot() { 
 parent::boot(); 
 static::creating(function($post) { 
  $post->createdBy = Session::get('userId'); 
 }); 
 static::updating(function($post) { 
 $post->updatedBy = Session::get('userId'); 
 }); 
 } 
 }