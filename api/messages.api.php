<?php
require_once 'db/db.php';
require_once 'model/chat.model.php';

$chatModel=new ChatModel();

if(isset($messageInfo)){
    $chatModel->addMessage($messageInfo["sender"], $messageInfo["receiver"], $messageInfo["message"]);
}
if(isset($user)){
    $stmt = $chatModel->getUserChat($user);
    $num = $stmt->rowCount();

    if($num>0){
        // messages array
        $messages_arr=array();
        $messages_arr["records"]=array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);

            $message_item=array(
                "id" => $id,
                "sender" => $sender,
                "receiver" => $receiver,
                "message" => $message,
                "date" => $date
            );

            array_push($messages_arr["records"], $message_item);
        }

        // set response code - 200 OK
        http_response_code(200);

        // show messages data in json format
        echo json_encode($messages_arr);
    }
    else{

        // set response code - 404 Not found
        http_response_code(404);

        // tell the user no messages found
        echo json_encode(
            array("message" => "No messages found.")
        );
    }
}



