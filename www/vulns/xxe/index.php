                    <!DOCTYPE html>
                    <html lang="en" dir="ltr">
                    <head>
                        <title>The O-Course</title>
                        <meta charset="UTF-8">
                        <link rel="stylesheet" href="../../../../../styles/layout.css" type="text/css">
                        <!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
                    </head>
                    <body>
                    <div class="wrapper row1">
                        <header id="header" class="clear">

                            <div id="hgroup">
                                <h1><a href="#">The O-Course</a></h1>
                                <h2>An OWASP Top 10 Obstacle Course for Beginners</h2>
                            </div>
                            <nav>
                                <div class="logo">
                                    <img src="../../../../../images/demo/logo.png">
                                </div>
                            </nav>
                        </header>
                    </div>
                    <!-- content -->
                    <div class="wrapper row2">
                        <div id="container" class="clear">
                            <section id="slider"><a href="#"><img src="../../../../../images/demo/lowcrawl.jpg" alt=""></a></section>
                            <section id="shout">
                                <h1>eXternal XML Entity (XXE) Injection: Low Crawl</h1>
                                <p>Not bad, recruit! Good work on the logs. Now let's move on to something a little more involved.</p>
                                <p>In the section below, you'll find a very, very nice button. This button is vulnerable to XXE. </p>
                                <p>There's an interesting user inside of this container, see if you can find their name by using an XXE injection to access the <code>/etc/passwd</code> file.</p>
                                <p>Ready? Go!</p>

                                <a href="/vulns/xss/welcome.php" class="previous">&laquo; Previous</a>
                                <a href="/vulns/" class="next">Next &raquo;</a>
                            </section>

                            <!-- content body -->
                            <div id="content">
                                <!-- main content -->
                                <section>
                                    <p><br><input class="button" margin="auto" width="250px" onclick="loadDoc();" value="Print Greeting"></p>

                                    <p id="demo"></p>

                                    <script>
                                        function loadDoc() {
//create the xml payload for xml-rpc
                                            var req_params;
                                            var greeting = "^.^";
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
                                </section>
                                <!-- ########################################################################################## -->
                                <!-- ########################################################################################## -->
                                <!-- ########################################################################################## -->
                                <!-- ########################################################################################## -->
                                <section id="services" class="last clear">
                                    <!-- article 1 -->
                                    <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler1') .style.display=='none') {document.getElementById('spoiler1') .style.display=''}else{document.getElementById('spoiler1') .style.display='none'}">HINT 1</button>
                                    <div id="spoiler1" style="display:none">
                                        <p>How can we identify that this button is vulnerable to XXE? Luckily, the page source code gives it away. Right-click on the Print Greeting button and select 'Inspect Element' to view the page source code. You'll find that the button calls to a Javascript function that uses XML to load the button's greeting.</p>
                                        <p>So, while there is no form to inject into like with the XSS, we can still manipulate the form from the client side of the house. You'll definitely want to use the Burp Repeater for this one!</p>
                                    </div>

                                    <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler2') .style.display=='none') {document.getElementById('spoiler2') .style.display=''}else{document.getElementById('spoiler2') .style.display='none'}">HINT 2</button>
                                    <div id="spoiler2" style="display:none">
                                        Load up Burp Suite and capture the page request when you click the Print Greeting button with the Interceptor. Then, send that page request to the Repeater by right-clicking and selecting 'Send to Repeater.' Now, you can craft a payload to send to the server.
                                    </div>

                                    <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler3') .style.display=='none') {document.getElementById('spoiler3') .style.display=''}else{document.getElementById('spoiler3') .style.display='none'}">HINT 3</button>
                                    <div id="spoiler3" style="display:none">
                                        Remember, XML external entities can be used to read local files from the web server. Craft an XML entity that uses <code>SYSTEM "file:///etc/passwd"</code> to read the <code>passwd</code> file from the file system.
                                    </div>

                                    <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler4') .style.display=='none') {document.getElementById('spoiler4') .style.display=''}else{document.getElementById('spoiler4') .style.display='none'}">REVEAL ANSWER</button>
                                    <div id="spoiler4" style="display:none">
                                        In Burp Repeater, replace the captured XML block with this:
                                        <img src="../../../../../images/demo/xmlscreenshot.png">
                                    </div>

                                    <!-- article 2 -->

                                </section>
                            </div>
                            <!-- / content body -->
                        </div>
                    </div>
                    <!-- footer -->
                    <div class="wrapper row3">
                        <footer id="footer" class="clear">
                            <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="https://huskyhacks.dev">HuskyHacks</a></p>
                            <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
                        </footer>
                    </div>
                    </body>
                    </html>


