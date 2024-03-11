<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->renderable(function (QueryException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Erro ao processar sua solicitação.'],
                    Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return back()->withInput()->with('error', 'Erro ao processar sua solicitação.');
        });
    }
}
