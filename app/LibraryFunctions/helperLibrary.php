<?php

namespace App\LibraryFunctions;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Log;

class helperLibrary
{




    public function getUser($userId)
    {
        $user = DB::table('users')
            ->select('id','userName')
            ->where('id',$userId)
            ->get();
        return $user[0]->userName;
    }

    public function noOfRecords($table)
    {
        $numberOfRecords= DB::table($table)->count();
        return $numberOfRecords;
    }

    public function noOfRecordsWithKey($table,$key,$value)
    {
        $numberOfRecords= DB::table($table)
            ->where($key,$value)
            ->count();
        return $numberOfRecords;
    }

    public function noOfRecordsWithKey2($table,$key1,$value1,$key2,$value2)
    {
        $numberOfRecords= DB::table($table)
            ->where($key1,$value1)
            ->where($key2,$value2)
            ->count();
        return $numberOfRecords;
    }

    public function noOfRecordsWithKey4($table,$key1,$value1,$key2,$value2,$key3,$value3,$key4,$value4)
    {
        $numberOfRecords= DB::table($table)
            ->where($key1,$value1)
            ->where($key2,$value2)
            ->where($key3,$value3)
            ->where($key4,$value4)
            ->count();
        return $numberOfRecords;
    }

    public function departmentalResearcherCounts($deptName)
    {
        $noOfRecord = DB::table('users')
            ->select('id')
            ->where('departmentName',$deptName)
            ->get();

        $activeResearcherArray =array();
        for($i =0; $i<count($noOfRecord);$i++)
        {
            $activeResearcherArray[] = $noOfRecord[$i]->id;
        }

        return $activeResearcherArray;

    }

    public function prevSuccessfulLoginTime($userId)
    {
        $lastLoginTime = DB::table('action_log')
            ->select('createdAt')
            ->where('userId',$userId)
            ->where('Action','Successful Login Attempt')
            ->orderBy('id','DESC')
            ->limit(1)
            ->get();
        return $lastLoginTime;
    }
    public function lastActivity($userId)
    {
        $lastAction = DB::table('action_log')
            ->select('action')
            ->where('userId',$userId)
            ->orderBy('id','DESC')
            ->limit(1)
            ->get();
        return $lastAction;
    }

    public function activityLogEntry($userId,$actionArea,$action)
    {
         $dt = Carbon::now();
        DB::table('action_log')->insert(
            [
                'userId' => $userId,
                'actionArea' => $actionArea,
                'action' => $action,
                'createdAt' => $dt
            ]);
    }

    public function getFieldValue($id, $fieldName, $tableName)
    {
        $field = DB::table($tableName)
            ->select($fieldName)
            ->where('id',$id)
            ->get();

        return $field;

    }


}
