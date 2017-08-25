<?php

namespace App\Http\Controllers\FMTC;

use App\Models\FMTC\ProgramDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProgramDetailController extends Controller
{

    public function index (Request $request)
    {
        return ProgramDetail::search($request->input(), true, true);
    }

    public function show (Request $request)
    {
        $program_detail                     = $this->getFromRoute($request);
        return response($program_detail);
    }

    /**
     * @param   Request $request
     * @return  ProgramDetail|null
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $program_detail                     = ProgramDetail::find($id);
        if (is_null($program_detail))
            throw new NotFoundHttpException('ProgramDetail not found');
        return $program_detail;
    }

}
