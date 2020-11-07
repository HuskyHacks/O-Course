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
        <section id="slider"><a href="#"><img src="../../../../../images/demo/ropeclimb.jpg" alt=""></a></section>
        <section id="shout">
            <h1>Structured Query Language Injection (SQLI) The Rope Climb</h1>
            <p> Alright, recruits! We're in the home stretch. Let's finish up strong and head home for chow and formation.</p>
            <p> The rope climb is the grand finale, so climb up there and ring that bell!</p>
            <p> The Login form below is vulnerable to SQLi, so let's do this two different ways.</p>
            <p> Try to inject into the database manually first.</p>
            <p> Then, blow the doors off with SQLmap and call it a day!</p>

            <a href="/vulns/" class="previous">&laquo; Previous</a>
            <a href="/finish.html" class="next">Next &raquo;</a>
        </section>

        <!-- content body -->
        <div id="content">
            <!-- main content -->
            <section>
                <?php include 'login.php';?>
            </section>
            <!-- ########################################################################################## -->
            <!-- ########################################################################################## -->
            <!-- ########################################################################################## -->
            <!-- ########################################################################################## -->
            <section id="services" class="last clear">
                <!-- article 1 -->
                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler1') .style.display=='none') {document.getElementById('spoiler1') .style.display=''}else{document.getElementById('spoiler1') .style.display='none'}">HINT 1</button>
                <div id="spoiler1" style="display:none">
                    <p> SQLi is achieved by escaping the query that is being used to gather the information from the back-end. What can you insert into the username field to close off the query?</p>
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler2') .style.display=='none') {document.getElementById('spoiler2') .style.display=''}else{document.getElementById('spoiler2') .style.display='none'}">HINT 2</button>
                <div id="spoiler2" style="display:none">
                    <p>Use a single quote to close off the query, so the username parameter inserts <code>admin'</code> into the query. Now, think about what other SQL syntax you can inject into the query to break the logical flow of the application.
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler3') .style.display=='none') {document.getElementById('spoiler3') .style.display=''}else{document.getElementById('spoiler3') .style.display='none'}">HINT 3</button>
                <div id="spoiler3" style="display:none">
                     Try using a a logical condition that would be evaluated by the database to be true. <code>1=1</code> is a pretty good one! And make sure you comment out the remaining query.</p>
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler4') .style.display=='none') {document.getElementById('spoiler4') .style.display=''}else{document.getElementById('spoiler4') .style.display='none'}">MANUAL: REVEAL ANSWER</button>
                <div id="spoiler4" style="display:none">
                    <p> In the <code>username</code> field, enter: <code>admin' OR 1=1 -- -</code>. Them check the bottom of the page for the flag! </p>
                 </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler5') .style.display=='none') {document.getElementById('spoiler5') .style.display=''}else{document.getElementById('spoiler5') .style.display='none'}">SQLMAP: REVEAL ANSWER</button>
                <div id="spoiler5" style="display:none">
                    <p>Use the Burp Intercept tool to capture a request to the page and save it as <code>page.req</code>. Then, pass this to SQLmap with the following syntax: <code>sqlmap -r page.req --level=5 --risk=3.</code></p>
                    <p>Follow the prompts and hit enter until SQLmap identifies the injection points. Then, enter the following syntax to enumerate the databases: <code>sqlmap -r page.req --dbs</code></p>
                    <p>Finally, once the databases are enumerated and you have identified the <code>website</code> database, perform a SQLmap dump: <code>sqlmap -r page-req --dump -D website</code></p>
                    <p>Make sure to read the contents of the dumped tables to find the flag!</p>
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

