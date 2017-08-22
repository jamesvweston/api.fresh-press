<?php

namespace App\Http\Controllers\Market;


use App\Http\Controllers\Controller;
use App\Models\Market\GigStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GigStatusController extends Controller
{

    public function index (Request $request)
    {
        return GigStatus::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $gig_status                       = $this->getFromRoute($request);
        return response($gig_status);
    }

    /**
     * @param   Request $request
     * @return  GigStatus|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $gig_status                         = GigStatus::find($id);
        if (is_null($gig_status))
            throw new NotFoundHttpException('GigStatus not found');
        return $gig_status;
    }

}
