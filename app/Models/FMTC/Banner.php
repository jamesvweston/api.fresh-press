<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $bannerid
 * @property    string                          $size
 * @property    string                          $filename
 */
class Banner extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblMerchantsBanners';

    protected $primaryKey = 'bannerid';


    //  https://logos.fmtc.co/120x60/2.gif

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('tblMerchantsBanners_column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'bannerid',
                    'size',
                    'filename',
                ]
            );
        });

    }

    /**
     * @return array
     */
    public function toArray()
    {
        $object['id']                   = $this->bannerid;
        $object['url']                  = 'https://logos.fmtc.co/' . $this->size . '/' . $this->filename;

        return $object;
    }


}