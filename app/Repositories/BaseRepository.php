<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use DB;

class BaseRepository
{

    public function save (Model $model)
    {
        DB::transaction(function () use ($model)
        {
            $model->save();
            return $model;
        });
    }

    public function update (Model $model)
    {
        DB::transaction(function () use ($model)
        {
            $model->update();
            return $model;
        });
    }

}