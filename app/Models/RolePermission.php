<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class RolePermission extends Model {
    protected $table = 'access_permission';
    public $timestamps=false;
    protected $fillable = [
       'userRole', 'permission', 'accessPermissionStatus'
    ];
    
}
