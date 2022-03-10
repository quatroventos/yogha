<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImportImagesController extends Controller
{
    public function index(){

        $pictures = \DB::table('descriptions')
            ->select('AccommodationId','Pictures')
            ->get();

       foreach($pictures as $pics){
           echo $pics->AccommodationId . "<br>";
           $picdetails = json_decode($pics->Pictures, true);
           if(!File::isDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/original/')){
               File::makeDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/original/', 0777, true, true);
           }

//           if(!File::isDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/adapted/')){
//               File::makeDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/adapted/', 0777, true, true);
//           }
//
//           if(!File::isDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/thumbnail/')){
//               File::makeDirectory(public_path() . '/accommodation-pics/'. $pics->AccommodationId . '/thumbnail/', 0777, true, true);
//           }

           foreach ($picdetails['Picture'] as $pic) {

               if( !empty($pic['OriginalURI'])){
                   $original = $pic['OriginalURI'];
                   copy($original, public_path() . '/accommodation-pics/' . $pics->AccommodationId . '/original/' . substr($original, strrpos($original, '/') + 1));
                   //echo "o=" . $original . " salvo!<br>";
               }

                //$adapted = $pic['AdaptedURI'];
//               copy($adapted, public_path() . '/accommodation-pics/' . $pics->AccommodationId . '/adapted/' . substr($original, strrpos($adapted, '/') + 1));
//               echo "a=" . $adapted . " salvo!<br>";
                //$thumbnail = $pic['ThumbnailURI'];
//               copy($thumbnail, public_path() . '/accommodation-pics/' . $pics->AccommodationId . '/thumbnail/' . substr($thumbnail, strrpos($thumbnail, '/') + 1));
//               echo "t=" . $thumbnail . " salvo!<br>";
           }

       }

       echo "imporação finaliada!";
   }
}
