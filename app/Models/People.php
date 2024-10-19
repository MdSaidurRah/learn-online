<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class People extends Model {
    protected $fillable = [
        'fullName',
        'slugTitle',
        'peopleCategory',
        'photo',
        'email',
        'designation',
        'contactNo',
        'shortJobDescription',
        'department_id',
        'departmentName',
        'office_id',
        'officeName',
        'committee_id',
        'committeeName',
        'profileLink',
        'faculty_id',
        'facultyName',
        'joinDate',
        'employmentType',
        'siteMembership',
        'peopleStatus',
        'peopleOrder',
        'accountValidity',
        'updatedBy'
    ];
    protected $table = 'people';

    public $timestamps=false;

    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->createdBy = Session::get('userId');
            $post->updatedBy = Session::get('userId');
        });
        static::updating(function($post) {
            $post->updatedBy = Session::get('userId');
        });
    }
}
