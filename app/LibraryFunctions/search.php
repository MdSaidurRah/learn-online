<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 5:57 PM
 */

namespace App\LibraryFunctions;

use Nyholm\Psr7\Request;
use DB;

class search
{
    public function getRegionNamebyId($id)
    {
        $regionName = DB::table('region_office')
            ->select('regionName')
            ->where('id',$id)
            ->get();
        return $regionName[0]->regionName;
    }

    public function getBuildingNamebyId($id)
    {
        $buildingName = DB::table('buildings')
            ->select('buildingName')
            ->where('id',$id)
            ->get();
        return $buildingName[0]->buildingName;
    }

    public function getFloorNamebyId($id)
    {
        $floorName = DB::table('building_floor')
            ->select('floorName')
            ->where('id',$id)
            ->get();
        return $floorName[0]->floorName;
    }

    public function getAreaNamebyId($id)
    {
        $areaName = DB::table('areas')
            ->select('areaName')
            ->where('id',$id)
            ->get();
        return $areaName[0]->areaName;
    }

    public function getLocationNamebyId($id)
    {
        $locationName = DB::table('locations')
            ->select('locationName')
            ->where('id',$id)
            ->get();
        return $locationName[0]->locationName;
    }

}
