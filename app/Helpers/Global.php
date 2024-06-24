<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

function success($data, $message)
{
    return response()->json([
        "status"    => true,
        "message"   => $message,
        "data"      => $data,
        "errorCode" => 0,
    ], 200);
}

function fails($message, $errorCode)
{
    return response()->json([
        "status"    => false,
        "message"   => $message,
        "data"      => null,
        "errorCode" => $errorCode,
    ], $errorCode);
}

function generateUniqueString($table, $column, $extension, $length = 16)
{
    do {
        $randomString = Str::random($length) . '.' . $extension;
    } while (DB::table($table)->where($column, $randomString)->exists());

    return $randomString;
}
