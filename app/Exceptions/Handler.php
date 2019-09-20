<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ResultType;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
        //dd($exception);
        
        if ($exception instanceof ModelNotFoundException)
            return (new ApiController)->apiResponse(ResultType::Error, null, str_replace('App\\', '', $exception->getModel()) . ' not found!', JsonResponse::HTTP_NOT_FOUND);
        else if ($exception instanceof NotFoundHttpException)
            return (new ApiController)->apiResponse(ResultType::Error, null, 'Page not found!', JsonResponse::HTTP_NOT_FOUND);
            
        return parent::render($request, $exception);
    }
}
