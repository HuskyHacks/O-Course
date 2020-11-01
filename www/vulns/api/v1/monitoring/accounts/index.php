<?php
header("Content-type: text/json");

$servername = "webDB";
$username = "root";
$password = "rootpassword";
$dbname = "website";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = isset($_POST['accounts']) ? mysqli_real_escape_string($conn, $_POST['accounts']) :  "";
	$sql = "SELECT * FROM `userInfo`;";
	$get_data_query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($get_data_query)!=0){
		$result = array();
		while($r = mysqli_fetch_array($get_data_query)){
			extract($r);
            $result[] = array("UID" => $user_id, "Phone" => $phone, 'SSN' => $socialsecnumber, "Desc" => $description);
		}
		$json = array("status" => 1, "info" => $result);
	}
	else{
		$json = array("status" => 0, "error" => "not found!");
	}
@mysqli_close($conn);
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);
}

//API can be called ONlY in POST method
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // receive json from url and deocode and store in data
    $data = json_decode(file_get_contents('php://input'), true);
    //check if received all necessary json format using is array
    if(is_array($data)){
        //check for all variables to be NOT NUll
        $uid = isset($data['user_id']) ? $data['user_id'] : '';
        $phone= isset($data['phone']) ? $data['phone'] : '';
        $socialsecnumber = isset($data['socialsecnumber']) ? $data['socialsecnumber'] : '';


        //check all variables value received are in INTEGER only others type NOT allowed such as float and string
        if(is_int($uid) && is_int($phone) && is_int($socialsecnumber)) {
            //MYSQL connection for POSTING JSON variable to database

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO 'userInfo' (user_id, phone, socialsecnumber )
			VALUES ('$uid','$phone','$socialsecnumber')";

            if ($conn->query($sql) === TRUE) {
                echo "Connection ok!";
            } else {
                echo json_encode(array( 'Error'=>'Database Error.'),true);
            }

            $conn->close();

            //json response to client with success client id
            $myObj=new \stdClass();
            $myObj->success = $uid;
            $myJSON = json_encode($myObj);
            echo $myJSON;
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
    echo json_encode(array( 'API'=>'server is working fine.'),true);

