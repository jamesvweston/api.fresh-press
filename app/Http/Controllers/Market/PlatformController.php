<?php

namespace App\Http\Controllers\Market;


use App\Models\Market\Platform;
use App\Repositories\Market\PlatformRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PlatformController extends Controller
{

    /**
     * @var PlatformRepository
     */
    private $platform_repo;


    public function __construct(PlatformRepository $platform_repo)
    {
        $this->platform_repo                = $platform_repo;
    }

    public function index (Request $request)
    {
        return $this->platform_repo->where([], true);
    }

    public function show (Request $request)
    {
        $platform                           = $this->getFromRoute($request);
        return response($platform);
    }

    /**
     * @param   Request $request
     * @return  Platform
     */
    private function getFromRoute (Request $request)
    {
        $id                                 = $request->route('id');

        $platform                           = $this->platform_repo->find($id);
        if (is_null($platform))
            throw new NotFoundHttpException('Platform not found');
        return $platform;
    }

}
