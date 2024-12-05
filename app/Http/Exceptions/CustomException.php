<?php

namespace App\Http\Exceptions;

use App\Models\Error;
use Exception;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomException extends Exception
{
    /**
     * handel exception error
     *
     * @param Exception $exception
     * @return JsonResponse
     */
    public static function render(Throwable $exception): JsonResponse
    {
        if ($exception instanceof ValidationException) {
            $code = 422;
            $messages = Error::error("Validation error", $exception->errors());
        } else if ($exception instanceof NotFoundHttpException) {
            $code = 404;
            $messages = Error::error("Not found", ['route / data not found']);
        } else {
            $code = method_exists($exception, "getStatusCode") ? $exception->getStatusCode() : 500;

            if ($code == 406) {
                $messages = Error::error("Invalid data", ["This data is not found"]);
            } else if ($code == 401) {
                $messages = Error::error("UnAuthorization", [$exception->getMessage()]);
            } else if ($code == 403) {
                $messages = Error::error("Access denied", [$exception->getMessage()]);
            } else if ($code == 500) {

                $messages = Error::error("Server error", [$exception->getMessage(), $exception->getTrace()]);
            } else {
                $messages = Error::error("Error", [$exception->getMessage()]);
            }
        }

        return response()->json($messages, $code);
    }
}
