<?php

namespace App\Exceptions;

use App\Model\Admin;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;

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
     * @param \Throwable $exception
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
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof UnauthorizedException){
            if (Auth::user() instanceof Admin){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('login_page');
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest(route('admin.login_page'));
        }

        if ($request->is('moderator') || $request->is('moderator/*')) {
            return redirect()->guest(route('moderator.login_page'));
        }

        return redirect()->guest(route('login_page'));
    }
//    if ($request->expectsJson()) {
//            return response()->json(['error' => 'Unauthenticated.'], 401);
//        }
//        $guard = array_get($exception->guards(), 0);
//
//        if ($guard == 'admin') {
//            return redirect()->guest(route('admin.login_page'));
//        }
//        if ($guard == 'moderator') {
//            return redirect()->guest(route('moderator.login_page'));
//        }
//        return redirect()->guest(route('login_page'));
//    }
}
