<?php

namespace App\Repositories;


interface RepositoryContract
{

    function where ($params = [], $paginate_results = false);

    function getQuery ();

    function with ();

    function find($id);

}