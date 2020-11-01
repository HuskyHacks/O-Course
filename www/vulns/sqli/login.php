<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SQL Injection</title>

</head>
<body>
<?

require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

// Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = $_POST["password"];
    }

// CHANGE SQL SELECT STATEMENT TO REMOVE SQL INJECT VULN

// Validate credentials
    if(empty($username_err) && empty($password_err)){
// Prepare a select statement
        $sql = "SELECT id, name FROM users WHERE username = '$username' && password = '$password'";

        if($stmt = mysqli_prepare($conn, $sql)){

// Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
// Store result
                mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) >= 1) {

                    mysqli_stmt_bind_result($stmt, $id, $name);

//fetch results from query and put into session
                    if(mysqli_stmt_fetch($stmt)) {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["name"] = $name;

// Redirect to welcome landing
                        mysqli_stmt_close($stmt);
                        echo "!!!!!**************** Pwned! :) flag{nice_database_you_got_there} *****************!!!!!!!";
                        exit();
                    } else {
                        $password_err = "Username/password combination not valid";
                        $username_err = "Username/password combination not valid";
                    }

                }
            }

// Close statement
            mysqli_stmt_close($stmt);
        }
    }

// Close connection

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="layout.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="container wrapper">
    <div class="row"></div>
    <div class="row align-middle">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="mailto:#">Contact an admin!</a></p>
        </form>
    </div>
</div>
</body>
</html>