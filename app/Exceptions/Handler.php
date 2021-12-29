<?php

namespace App\Exceptions;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // dd($exception->getMessage());
        // dd($exception->getMessage() );
        // dd($exception->getCode());
         if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            return response()->json(
                ['msg' => 'Token Invalid or Expired'],401
            );
        }
        else if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException){
            return response()->json(
                ['msg' => 'Token Invalid Expired'],401
            );
        }
        else if ($exception instanceof \Symfony\Component\HttpKernel\Exception\TokenInvalidException){
            return response()->json(
                ['msg' => 'Token Invalid Expired'],401
            );
        }
        
        return parent::render($request, $exception);
    }
}
