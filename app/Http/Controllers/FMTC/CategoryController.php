<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{

    public function index (Request $request)
    {
        return Category::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $category                           = $this->getFromRoute($request);
        return response($category);
    }


    /**
     * @param   Request $request
     * @return  Category|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $category                           = Category::find($id);
        if (is_null($category))
            throw new NotFoundHttpException('Category not found');
        return $category;
    }

}
