<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\DeliverableType;
use App\Repositories\Market\DeliverableTypeRepository;
use Illuminate\Http\Request;

class DeliverableTypeController extends Controller
{

    /**
     * @var DeliverableTypeRepository
     */
    private $deliverable_type_repo;


    public function __construct(DeliverableTypeRepository $deliverable_type_repo)
    {
        $this->deliverable_type_repo            = $deliverable_type_repo;
    }


    public function index (Request $request)
    {
        return $this->deliverable_type_repo->findAll();
    }

    public function show (Request $request)
    {
        $deliverable_type                       = $this->getFromRoute($request);
        return response($deliverable_type);
    }

    /**
     * @param   Request $request
     * @return  DeliverableType|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $deliverable_type                               = $this->deliverable_type_repo->find($id);
        if (is_null($deliverable_type))
            throw new NotFoundHttpException('DeliverableType not found');
        return $deliverable_type;
    }

}
