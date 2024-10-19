<?php
 namespace App\Models;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Facades\Session; 
 class Answerkey extends Model { 
  protected $table = 'answerkey'; 
 public $timestamps=false; 
 protected $fillable = [ 
 'answerBody','answerType','answerkeyStatus','entityObjectOrder' 
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