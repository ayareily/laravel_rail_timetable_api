<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Goutte\Client;

class Timetable extends Model
{
    public static function getTimetable(){
        $client = new Client();

    //取得とDOM構築
    $crawler = $client->request('GET','https://transit.yahoo.co.jp/station/time/21044/?gid=231');

    //要素の取得
    $tr = $crawler->filter('#hh_11 > td:nth-child(2) > ul > li > a > dl > dt')->each(function($element){
        return $element->text();
    });

    return $tr;
    
    }
}
