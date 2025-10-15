<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (HttpException $e, $request) {
            // Handle expired verification links
            if ($e->getStatusCode() === 403 && $request->hasValidSignature()) {
                return redirect()->route('verification.notice')
                    ->with('error', 'The verification link has expired. Please request a new verification email.');
            }
        });
    }

    public function render($request, Throwable $exception)
    { 
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return response()->view('auth.login', [], 419);
        }

        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return response()->view('auth.login', [], 404);
        }

        return parent::render($request, $exception);
    }

}
