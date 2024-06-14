<?php
function success($data, $message)
{
    return response()->json([
        "status" => true,
        "message" => $message,
        "data" => $data,
        "errorCode" => 0,
    ], 200);
}

function fails($message, $errorCode)
{
    return response()->json([
        "status" => false,
        "message" => $message,
        "data" => null,
        "errorCode" => $errorCode,
    ], $errorCode);
}
