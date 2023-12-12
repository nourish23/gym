<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
           // 'status' => true,
            'message' => $message,
            'data'    => $result,  
        ];
        
        return response()->json($response, 200);
    }

    public function sendResponsePaginate($result, $message)
    {
       // dd($result['meta']);
        $response = [
           // 'status' => true,
            'message' => $message,
          //  'data'    => array_values($result),
        ];

        
        $response['data'] = $result['data'];
      //  $response['first_page_url'] = $result['links']['first'];

       // $response['from'] = $result['meta']['from'];
     //   $response['last_page'] = $result['links']['last'];
      //  $response['pages_no'] = $result['links']['last'];
     //   $response['last_page_url'] = $result['meta']['path'];
      //  $response['links'] = $result['meta']['links'];

       // $response['next_page_url'] = $result['links']['next'];
        $response['meta']['current_page'] = $result['meta']['current_page'];
        $response['meta']['last_page'] = $result['meta']['last_page'];
    //    $response['per_page'] = $result['meta']['per_page'];
        //$response['prev_page_url'] = $result['links']['prev'];
      //  $response['to'] = $result['meta']['to'];
        $response['meta']['total'] = $result['meta']['total'];

        return response()->json($response, 200);
    }
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
           // 'status' => false,
            'message' => $error,
        ];


        //if(!empty($errorMessages)){
            $response['data'] = null;//$errorMessages;
       // }


        return response()->json($response, $code);
    }

 

}