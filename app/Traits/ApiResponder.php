<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponder
{
    /**
     * @param $message
     * @param array $data
     * @return array
     */
    protected function success($message, $data = [])
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    /**
     * @param $message
     * @return array
     */
    protected function failure($message)
    {
        return [
            'success' => false,
            'message' => $message,
        ];
    }
}
