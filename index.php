<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$event = $json->result->parameters->event;
	$token = $json->result->parameters->token;
	$uid = $json->result->parameters->uid;
	$contactUid = $json->result->parameters->contact[uid];
	$contactName = $json->result->parameters->contact[name];
	$contactType = $json->result->parameters->contact[type];
	$messageDtm = $json->result->parameters->message[dtm];
	$messageUid = $json->result->parameters->message[uid];
	$messageCuid = $json->result->parameters->message[cuid];
	$messageDir = $json->result->parameters->message[dir];
	$messageType = $json->result->parameters->comessage[type];
	$messageBody = $json->result->parameters->message[body];
	$ack = $json->result->parameters->ack;
	
	if($event == "message") {
		
		$replyMsg = "Event: " . $event . ", Msg: " . $messageBody . ".";
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
