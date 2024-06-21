<?php
	function success($data, $message) {
		return response()->json([
			"data" => $data,
			"status" => true,
			"message" => $message,
        ]);
	}
	
	function fails($message, $errorCode) {
		return response()->json([
			"data" => null,
			"status" => false,
			"meesage" => $message,
		], $errorCode);
	}
?>