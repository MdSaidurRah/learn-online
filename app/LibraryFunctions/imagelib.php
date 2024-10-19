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
use Carbon\Carbon;
use DB;
use Image;

class imagelib
{
    public function connectinocheck()
    {
        return "Successful";
    }

    public function photoUpload( Request $request,$fileName,$uploadPath,$nameprefix,$parent,$parentId)
    {
        if ($request->hasFile($fileName)) {
            $allowedfileExtension = ['jpg','jpeg', 'png', 'svg','pdf'];
            $files = $request->file($fileName);
            $extension = $files->getClientOriginalExtension();
            $filename = $this->fileNameGenerate($extension,$parentId,$parent);
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $destinationPath = $uploadPath;
                $photoUrl = $nameprefix . $filename;
                //   $photoUrl = $destinationPath . $filename;
                $files->move($destinationPath, $photoUrl);
                return $photoUrl;
            }
        }
    }


    public function fileNameGenerate($extention,$parentId,$title)
    {
        $mytime = Carbon::now();
        $key =  $mytime->toArray();
        $filenamekey = $key['timestamp'];
        return $parentId.'_'.$filenamekey.'_'.$title.'.'.$extention;
    }


    public function documentUpload( Request $request,$fileName,$uploadPath,$nameprefix, $documentTitle)
    {
        if ($request->hasFile($fileName)) {
            $allowedfileExtension = ['pdf'];
            $files = $request->file($fileName);
            $extension = $files->getClientOriginalExtension();
            $filename = $this->fileNameGenerate($extension,0, $documentTitle);
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $destinationPath = $uploadPath;
                $photoUrl = $nameprefix . $filename;
                //   $photoUrl = $destinationPath . $filename;
                $files->move($destinationPath, $photoUrl);
                return $photoUrl;
            }
        }
    }

    // public function photoUpload( Request $request,$fileName,$uploadPath,$nameprefix)
    // {
    //     if ($request->hasFile($fileName)) {
    //         $allowedfileExtension = ['jpg','jpeg', 'png', 'svg'];
    //         $files = $request->file($fileName);
    //         $extension = $files->getClientOriginalExtension();
    //         $filename = $this->fileNameGenerate($extension,0);
    //         $check = in_array($extension, $allowedfileExtension);
    //         if ($check) {
    //             $destinationPath = $uploadPath;
    //             $photoUrl = $nameprefix . $filename;
    //             //   $photoUrl = $destinationPath . $filename;
    //             $files->move($destinationPath, $photoUrl);
    //             return $photoUrl;
    //         }
    //     }
    // }




//    public function photoUpload( Request $request,$fileName,$uploadPath)
//    {
//        if ($request->hasFile($fileName)) {
//            $allowedfileExtension = ['jpg','jpeg', 'png'];
//            $files = $request->file($fileName);
//            $extension = $files->getClientOriginalExtension();
//            $filename = $this->fileNameGenerate($extension,0);
//            $check = in_array($extension, $allowedfileExtension);
//            if ($check) {
//                $destinationPath = $uploadPath;
//                $photoUrl = $destinationPath . $filename;
//                $files->move($destinationPath, $photoUrl);
//                return $photoUrl;
//            }
//        }
//    }



}
