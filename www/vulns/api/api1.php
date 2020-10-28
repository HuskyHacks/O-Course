<?php
header("Content-type: text/json");
//API can be called ONlY in POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // receive json from url and deocode and store in data
    $data = json_decode(file_get_contents('php://input'), true);
    //check if received all neccessary json format using is array
    if(is_array($data)){
        //check for all variables to be NOT NUll
        $uid = isset($data['user_id']) ? $data['user_id'] : '';
        $male = isset($data['male']) ? $data['male'] : '';
        $female = isset($data['female']) ? $data['female'] : '';


        //check all variales value received are in INTEGER only others type NOT allowed such as float and string
        if(is_int($uid) && is_int($male) && is_int($female)) {
            //MYSQL connection for POSTING JSON variable to database
            $servername = "website";
            $username = "root";
            $password = "rootpassword";
            $dbname = "userID";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO user (user_id, male, female )
			VALUES ('$uid','$male','$female')";

            if ($conn->query($sql) === TRUE) {
                // echo "sucessfully saved";

            } else {
                echo json_encode(array( 'Error'=>'Database Error.'),true);
            }

            $conn->close();

            //json response to client with success client id
            $myObj=new \stdClass();
            $myObj->success = $uid;
            $myJSON = json_encode($myObj);
            echo $myJSON;
            // after receiveing correct JSON Response with  JSON , success as KEY and UId as value
        }
        else
            // error to handle JSON KEY  value should be in INteger and as per format
            echo json_encode(array( 'Error'=>'KEY missing or value should be in integer only'),true);
    }
    else
        //check for valid JSON format
        echo json_encode(array( 'Error'=>'Error Check Json Format'),true);

}
else
    //For Handle GET , PUT and others  Request
    echo json_encode(array( 'API'=>'server is working fine.'),true);
?>
