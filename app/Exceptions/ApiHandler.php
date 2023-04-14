<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

trait ApiHandler
{
    public function getJsonExceptions (\Throwable $e): JsonResponse
    {

        if($e instanceof ValidationException ) {
            return $this->getJsonValidationException($e);
        }

        dd($e);
    }


    private function getJsonValidationException(ValidationException $e): JsonResponse
    {
        return default_response(
            "Erro de validação dos dados enviados",
            "validation_error",
            400,
            $e->errors()
        );
    }
}
