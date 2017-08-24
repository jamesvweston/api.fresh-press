<?php

namespace App\Models\FMTC;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property    int                             $id
 * @property    string                          $name
 * @property    string                          $logo
 * @property    string                          $website
 * @property    string                          $description
 * @property    string                          $email
 * @property    string                          $phone
 * @property    string                          $facebook
 * @property    string                          $twitter
 * @property    string                          $linkedin
 * @property    string                          $pinterest
 * @property    string                          $google_plus
 */
class OPM extends Model
{

    protected $connection = 'fmtc';

    protected $table = 'tblOPMs';

    protected $primaryKey = 'nOPMID';


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('column_mapping', function (Builder $builder)
        {
            $builder->select(
                [
                    'nOPMID AS id',
                    'cName AS name',
                    'cLogo AS logo',
                    'cWebsite AS website',
                    'cDescription AS description',
                    'cEmail AS email',
                    'cPhone AS phone',
                    'cFacebook AS facebook',
                    'cTwitter AS twitter',
                    'cLinkedIn AS linkedin',
                    'cInstagram AS instagram',
                    'cPinterest AS pinterest',
                    'cGooglePlus AS google_plus',
                ]
            );
        });

        static::addGlobalScope('only_active', function (Builder $builder)
        {
            $builder->where('bActive', 1);
        });
    }


}