<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

trait ApiHandler
{
    public function getJsonExceptions (\Throwable $e): JsonResponse
    {

        if($e instanceof ValidationException) {
            return $this->validationException($e);
        }

        if($e instanceof AuthenticationException){
            return $this->authenticationException($e);
        }

        if($e instanceof TokenBlacklistedException){
            return $this->authenticationException($e);
        }

        if($e instanceof AuthorizationException){
            return $this->authorizationException($e);
        }

        if($e instanceof ModelNotFoundException){
            return $this->modelNotFoundException();
        }

        if($e instanceof HttpException){
            return $this->httpException($e);
        }

        return $this->genericException($e);
    }


    protected function authenticationException(
        AuthenticationException|TokenBlacklistedException $e
    ): JsonResponse
    {
        return default_response($e->getMessage(), 'token_not_valid', 401);
    }

    protected function genericException(\Throwable $e): JsonResponse
    {
        return default_response('Erro interno no servidor', 'internal_server_error', 500);
    }

    protected function authorizationException(AuthorizationException $e): JsonResponse
    {
        return default_response($e->getMessage(), 'authorization_error', 403);
    }

    protected function modelNotFoundException(): JsonResponse
    {
        return default_response('Objeto não encontrado', 'model_not_found', 404);
    }

    protected function httpException(HttpException $e): JsonResponse
    {
        return default_response($e->getMessage(), 'http_exception', $e->getStatusCode());
    }

    protected function validationException (ValidationException $e): JsonResponse
    {
        return default_response($e->getMessage(), 'validation_error', 422, $e->errors());
    }

}
