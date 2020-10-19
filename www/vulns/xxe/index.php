<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>XML External Entity</title>

</head>
<body>


<!-- Sidebar -->
<div id="wrapper">
                    <form action="<?php $_PHP_SELF ?>" method="POST">
                        Name: <input type="text" name="name" value="<name></name>" />
                        <input type="submit" />
                    </form>
</body>

<?php

if (isset( $_POST["name"]))
{
    if (!preg_match("/<|>/",$_POST['name'] ))           //input validation
    {
        die ("Error converting XML value to object");
    }
    $xml=simplexml_load_string($_POST['name']);       //Interprets a string of XML into an object
    $yourname = ((string)$xml);
    print "<br><br> Hello $yourname";

    exit();
}
?>
</html>