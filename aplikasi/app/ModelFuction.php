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

    public static function formatDateTimeIndo($date_time)
    {
        $arr_date_time = explode(" ", $date_time);
        $date = $arr_date_time[0];
        $time = $arr_date_time[1];

        $arr_date = explode("-", $date);
        $bulan = $arr_date[1];
        $hasil_bulan = null;
        if($bulan == 01)
        {
            $hasil_bulan = "januari";
        }else if($bulan == 02)
        {
            $hasil_bulan = "februari";
        }else if($bulan == 03)
        {
            $hasil_bulan = "maret";
        }else if($bulan == 04)
        {
            $hasil_bulan = "april";
        }else if($bulan == 05)
        {
            $hasil_bulan = "mei";
        }else if($bulan == 06)
        {
            $hasil_bulan = "juni";
        }else if($bulan == 07)
        {
            $hasil_bulan = "juli";
        }else if($bulan == 07)
        {
            $hasil_bulan = "agustus";
        }else if($bulan == 07)
        {
            $hasil_bulan = "september";
        }else if($bulan == 10)
        {
            $hasil_bulan = "oktober";
        }else if($bulan == 11)
        {
            $hasil_bulan = "november";
        }else if($bulan == 12)
        {
            $hasil_bulan = "desember";
        }

         return $arr_date[2].", ".$hasil_bulan." ".$arr_date[0]." Jam ".$time;
    }
}
