<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 5:57 PM
 */

namespace App\LibraryFunctions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class accesslogger
{

    public function logEntry($userId, $actionName, $workingDomain, $note, $reference)
    {
        $time = Carbon::now();
        $currentTime = $time->toDateTimeString();

        DB::table('access_logs')->insert(
            [
                'userId' =>$userId,
                'actionName' =>$actionName,
                'workingDomain' => $workingDomain,
                'note' => $note,
                'createdAt' => $currentTime,
                'createdBy' => $userId,
                'updatedAt' => $currentTime,
                'updatedBy' => $userId
            ]
        );
        return true;
    }



}
