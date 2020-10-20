<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>XXE</title>

</head>
<body>
                    <script>
                        function loadDoc() {
//create the xml payload for xml-rpc
                            var req_params;
                            var greeting = "DVWS";
                            req_params = "<uservalue>\n";
                            req_params = req_params + "<value>"+ greeting + "</value>\n";
                            req_params = req_params + "</uservalue>\n";


                            var xhttp;
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    xmlDoc = xhttp.responseText;
                                    txt = "";
                                    document.getElementById("demo").innerHTML = xhttp.responseText;
                                }
                            };
                            xhttp.open("POST", "server.php", true);
                            //send the request
                            xhttp.send(req_params);
                        }
                    </script>
</body>

</html>