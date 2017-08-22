<?php

namespace App\Models\Traits;


use DB;

trait DBTransactions
{

    public function save (array $options = [])
    {
        DB::transaction(function () use ($options)
        {
            return parent::save($options);
        });
    }

    public function update (array $attributes = [], array $options = [])
    {
        DB::transaction(function () use ($attributes, $options)
        {
            return parent::update($attributes, $options);
        });
    }
}