<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblCouponsActive';


    protected $fillable = [
        'id',
        'label',
        'code',
        'link',
        'restrictions',
        'affiliate_link',
        'merchant_id',
        'merchant_name',
        'merchant_skimlink',
        'network_id',
        'added',
        'updated',
        'begin',
        'beginTimezone',
        'expire',
        'expireTimezone',
    ];

}