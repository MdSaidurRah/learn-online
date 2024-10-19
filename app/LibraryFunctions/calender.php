<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 5:57 PM
 */

namespace App\LibraryFunctions;

use Carbon\Carbon;

class calender
{

    public function getWorkingMonth($monthId)
    {
        $monthKey = array('x','January','February','March','April','May','June','July','August','September','October','November','December');
        return $monthKey[$monthId];
    }


    public function getMonthNumber($monthId)
    {
        $month = 0;
        if($monthId =="January")
        {
            $month = 1;
        }elseif ($monthId =="February")
        {
            $month = 2;
        }elseif ($monthId =="March")
        {
            $month =  3;
        }elseif ($monthId =="April")
        {
            $month = 4;
        }elseif ($monthId =="May")
        {
            $month = 5;
        }elseif ($monthId =="June")
        {
            $month = 6;
        }elseif ($monthId =="July")
        {
            $month = 7;
        }elseif ($monthId =="August")
        {
            $month = 8;
        }elseif ($monthId =="September")
        {
            $month = 9;
        }elseif ($monthId =="October")
        {
            $month = 10;
        }elseif ($monthId =="November")
        {
            $month = 11;
        }elseif ($monthId =="December") {
            $month = 12;
        }
        return $month;
    }



    public function getCalenderMonthKey($monthId)
    {
        $month = 0;
        if($monthId ==1)
        {
            $month = 1;
        }elseif ($monthId ==2)
        {
            $month = 2;
        }elseif ($monthId ==3)
        {
            $month =  3;
        }elseif ($monthId ==4)
        {
            $month = 4;
        }elseif ($monthId ==5)
        {
            $month = 5;
        }elseif ($monthId ==6)
        {
            $month = 6;
        }elseif ($monthId ==7)
        {
            $month = 7;
        }elseif ($monthId ==8)
        {
            $month = 8;
        }elseif ($monthId ==9)
        {
            $month = 9;
        }elseif ($monthId ==10)
        {
            $month = 10;
        }elseif ($monthId ==11)
        {
            $month = 11;
        }elseif ($monthId ==12) {
            $month = 12;
        }
        return $month;
    }



    public function getCalenderMonth($monthId)
    {
        $january =array(0,0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
        $february=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,0,0,0,0,0,0,0);
        $march=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,0,0,0,0);
        $april=array(0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,0,0);
        $may=array(31,0,0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
        $june=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,0,0,0,0);
        $july=array(0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,0);
        $august=array(30,31,0,0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29);
        $september=array(0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,0,0,0);
        $october=array(0,0,0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
        $november=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,0,0,0,0,0);
        $december=array(0,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,0,0);

        $month = '';
        if($monthId ==1)
        {
            $month = $january;
        }elseif ($monthId ==2)
        {
            $month = $february;
        }elseif ($monthId ==3)
        {
            $month =  $march;
        }elseif ($monthId ==4)
        {
            $month = $april;
        }elseif ($monthId ==5)
        {
            $month = $may;
        }elseif ($monthId ==6)
        {
            $month = $june;
        }elseif ($monthId ==7)
        {
            $month = $july;
        }elseif ($monthId ==8)
        {
            $month = $august;
        }elseif ($monthId ==9)
        {
            $month = $september;
        }elseif ($monthId ==10)
        {
            $month = $october;
        }elseif ($monthId ==11)
        {
            $month = $november;
        }elseif ($monthId ==12)
        {
            $month = $december;
        }
        return $month;
    }

    public function monthNavigator($monthid)
    {
        $next = '';
        $previous ='';
        if($monthid==1)
        {
            $next = $monthid + 1;
            $previous =  1;
        }elseif($monthid==2)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==2)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==3)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==4)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==5)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==6)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==7)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==8)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==9)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==10)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==11)
        {
            $next = $monthid+1;
            $previous = $monthid - 1;
        }elseif($monthid==12)
        {
            $next = 12;
            $previous = $monthid - 1;
        }

        $navButtonSet = array(
            'selected'=>$monthid,
            'next'=>$next,
            'previous'=>$previous,
            'start'=>1,
            'end'=>12
        );

        return $navButtonSet;
    }

}
