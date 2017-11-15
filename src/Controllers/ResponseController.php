<?php

namespace Packages\Uber\Controllers;

use Illuminate\Routing\Controller;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class ResponseController extends Controller
{
	/**
     * Create a new APIController's instance.
     *
     * @return void
     */
	public function __construct()
	{
		parent::__construct();
	}

	 /**
     * Validation Fail error
     * 
     * @param  $validation | validator instance
     * @return json.
     */
    public function respondValidationFailed($validation = [])
    {
        $statusCode = Response::HTTP_PRECONDITION_FAILED;

        $error = [
            'status' => $statusCode,
            'message' => 'Validation Failed',
            'errors' => $validation,
        ];
        
        return response()->json($error, $statusCode);
    }

     /**
     * Format error response in json.
     * 
     * @param  $message: string of error message.
     * @param  $statusCode: integer error status code.
     * @return json.
     */
    public function getNotFoundErrorResponse($response_message ='something went wrong',$statusCode = Response::HTTP_NOT_FOUND)
    {
        $error = [
            'status' => $statusCode,
            'error' => $response_message,
        ];
        
        return response()->json($error, $statusCode);
    }

    /**
     * Format error response in json.
     * 
     * @param  $message: string of error message.
     * @param  $statusCode: integer error status code.
     * @return json.
     */
    public function getErrorResponse($response_message = 'Internal server error',$statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        $error = [
            'status' => $statusCode,
            'message' => $response_message,
        ];
        
        return response()->json($error, $statusCode);
    }

    public function responseSuccess($data , $response_message = 'Success', $statusCode = Response::HTTP_OK)
    {
        $message = [
            'status' => $statusCode,
            'data' => $data,
            'message'=> $response_message,
        ];
        return response()->json($message, $statusCode);
    }
}