<?php

namespace App\Http\Responses;

class ResultResponse
{
    const SUCCESS_CODE = 200;
    const ERROR_CODE = 300;
    const ERROR_ELEMENT_NOT_FOUND_CODE = 404;
    const TXT_SUCCESS_CODE = 'Success';
    const TXT_ERROR_CODE = 'Error';
    const TXT_ERROR_ELEMENT_NOT_FOUND_CODE = 'Element not found';

    public $statusCode;
    public $message;
    public $data;

    public function __construct()
    {
        $this->statusCode = self::ERROR_CODE;
        $this->message = 'Error';
        $this->data = [];
    }

    public function setStatusCode($statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setData($data): void
    {
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $this->data = [
                'items' => $data->items(),
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
            ];
        } else {
            $this->data = $data;
        }
    }

    public function getData()
    {
        return $this->data;
    }
}
