<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\ProductLine;
use App\Repositories\Market\ProductLineRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductLineController extends Controller
{

    /**
     * @var ProductLineRepository
     */
    private $product_line_repo;


    public function __construct(ProductLineRepository $product_line_repo)
    {
        $this->product_line_repo            = $product_line_repo;
    }

    public function index (Request $request)
    {
        return $this->product_line_repo->findAll();
    }

    public function show (Request $request)
    {
        $product_line                           = $this->getFromRoute($request);
        return response($product_line);
    }

    /**
     * @param   Request $request
     * @return  ProductLine
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $product_line                           = $this->product_line_repo->find($id);
        if (is_null($product_line))
            throw new NotFoundHttpException('ProductLine not found');
        return $product_line;
    }

}
