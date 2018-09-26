<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$event = $json->result->parameters->event;
	$token = $json->result->parameters->token;
	$uid = $json->result->parameters->uid;
	$cuid = $json->result->parameters->cuid;
	$ack = $json->result->parameters->ack;
	
	if($event == "message") {
		
		$replyMsg = "Event: " . $event . ".";
	}
	else if($event == "ack") {
		$replyMsg = "Event: " . $event . ", Ack: " . $ack . ".";
	}
	else{
		$replyMsg = "Parameter not complete";
	}
	$response = new \stdClass();
	$response->apiwha_autoreply = $replyMsg;
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}
?>
