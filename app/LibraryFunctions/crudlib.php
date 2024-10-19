<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 5:57 PM
 */

namespace App\LibraryFunctions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class crudlib
{


    public function create(Model $model,$data)
    {
        $modelinstance = $model;
        $key = $modelinstance->create($data);
        return $key;
    }

    public function update(Model $model,$dataArray,$key, $value)
    {
        $modelinstance = $model;
        $data = $modelinstance
            ->where($key,$value)
            ->update($dataArray);
        return $data;
    }
    public function update2(Model $model,$dataArray,$key, $value,$key2, $value2)
    {
        $modelinstance = $model;
        $data = $modelinstance
            ->where($key,$value)
            ->where($key2,$value2)
            ->update($dataArray);
        return $data;
    }

    public function readAll (Model $model)
    {
        $modelinstance = $model;
        $data = $modelinstance->get();
        return $data;
    }

    public function delete(Model $model,$key, $value)
    {
        $modelinstance = $model;
        $data = $modelinstance->where($key,$value)->delete();
        return $data;
    }

    public  function readById(Model $model,$id)
    {
        $modelinstance = $model;
        $data = $modelinstance->where('id',$id)->get();
        return $data;
    }

    public  function readByKeyId(Model $model,$key, $value)
    {
        $modelinstance = $model;
        $data = $modelinstance->where($key,$value)->get();
        return $data;
    }


    public  function readByKeyId2(Model $model,$key1, $value1,$key2, $value2)
    {
        $modelinstance = $model;
        $data = $modelinstance
            ->where($key1,$value1)
            ->where($key2,$value2)->get();
        return $data;
    }

    public  function readByKeyId3(Model $model,$key1, $value1,$key2, $value2,$key3, $value3)
    {
        $modelinstance = $model;
        $data = $modelinstance
            ->where($key1,$value1)
            ->where($key2,$value2)
            ->where($key3,$value3)
            ->get();
        return $data;
    }


}
