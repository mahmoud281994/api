<?php
namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

trait exceptionTrait
{
public function apiException($request,$e)
{
	 if ($e instanceof ModelNotFoundException)
        {
            return response()->json([
                'errors'=>'Model not found'
            ],Response::HTTP_NOT_FOUND);
        }
         if ($e instanceof NotFoundHttpException) {
             return response ([
                'errors'=>'incorrect route'],Response::HTTP_NOT_FOUND
             );

         }
                 return parent::render($request, $e);

}
}