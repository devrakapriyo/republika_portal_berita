<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class ModelFuction extends Model
{
    public static function getSeoUrl($value)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $value = strtolower($value);
        //Strip any unwanted characters
        $value = preg_replace("/[^a-z0-9_\s-]/", "", $value);
        //Clean multiple dashes or whitespaces
        $value = preg_replace("/[\s-]+/", " ", $value);
        //Convert whitespaces and underscore to dash
        $value = preg_replace("/[\s_]/", "-", $value);

        return $value;
    }

    public static function uploadFile($images, $name, $path)
    {
        $image = $images;
        if ($image->getSize() > 1000000)
        {
            return false;
        }
        $extension = strstr($image->getClientOriginalName(), '.');
        $file_name = $name.$extension;
        $image->move($path, $file_name);

        return $file_name;
    }

    public static function getReadMore($string, $url, $limit)
    {
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            $string .= '... <a href='.url($url).'>baca selanjutnya</a>';
        }

        return $string;
    }

    public static function getReadMoreNoButton($string, $limit)
    {
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
        }

        return $string;
    }

    public static function getIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
