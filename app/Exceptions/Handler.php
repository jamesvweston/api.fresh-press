<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        \FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (!config('app.debug') || $this->isHttpException($exception))
        {
            $response = [
                'message'           => $exception->getMessage(),
            ];

            $status                 = 500;

            //  HttpException checks
            if ($this->isHttpException($exception))
            {
                $status = $exception->getStatusCode();
                if ($status == 404)
                {
                    if (empty($response['message']))
                        $response['message'] = 'You are most likely trying access a route that does not exist. Check your spelling and syntax.';
                }
            }



            if (config('app.debug'))
            {
                $response['debug'] = [
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'exception' => $exception->getTraceAsString()
                ];
            }

            return response()->json($response, $status);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $auth_header                    = $request->header('Authorization');
        if (is_null($auth_header))
            throw new BadRequestHttpException('Authorization is required in header');
        $auth_header                    = explode('Bearer ', $auth_header);
        if (sizeof($auth_header) != 2)
            throw new BadRequestHttpException('Authorization parameter is incorrect. Start the value with "Bearer "');

        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
