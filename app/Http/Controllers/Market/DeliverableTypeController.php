<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\DeliverableType;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeliverableTypeController extends Controller
{


    public function index (Request $request)
    {
        return DeliverableType::search($request->input(), true, true);
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

        $deliverable_type                   = DeliverableType::find($id);
        if (is_null($deliverable_type))
            throw new NotFoundHttpException('DeliverableType not found');
        return $deliverable_type;
    }

}
