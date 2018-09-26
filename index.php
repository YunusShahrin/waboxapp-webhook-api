<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$json = json_decode($_POST["data"]);

	$event = $json->event;
	$token = $json->token;
	$uid = $json->uid;
	$contactUid = $json->contact[uid];
	$contactName = $json->contact[name];
	$contactType = $json->contact[type];
	$messageDtm = $json->message[dtm];
	$messageUid = $json->message[uid];
	$messageCuid = $json->message[cuid];
	$messageDir = $json->message[dir];
	$messageType = $json->comessage[type];
	$messageBody = $json->message[body];
	$ack = $json->ack;
	
	if($event == "message") {
		
		$replyMsg = "From: " . $from . ", Msg: " . $text . ".";
	}
	else if($event == "ack") {
		$replyMsg = "From: " . $from . ", To: " . $to . ", Status: Processed.";
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