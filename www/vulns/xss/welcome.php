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
        <section id="slider"><a href="#"><img src="../../../../../images/demo/log.jpg" alt=""></a></section>
        <section id="shout">
            <h1>Cross Site Scripting (XSS): The Logs</h1>
            <p>First up, our warm up! The Logs look a lot worse than they really are.</p>
            <p>That search bar down below this section is vulnerable to XSS. Give it a shot!</p>

            <a href="/nav.html" class="previous">&laquo; Previous</a>
            <a href="/vulns/xxe/" class="next">Next &raquo;</a>
        </section>

        <!-- content body -->
        <div id="content">
            <!-- main content -->
            <section>
                <!-- A simple form that when submitted will navigate back to the same page -->
                <form action="" method="GET">
                    <!-- Adds `?q=VALUE` to the URL when the form is submitted -->
                    <input type="text" name="q">
                    <input type="submit" value="Search">
                </form>

                <!-- The results of the search are inserted here -->
                <div id="results"></div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {

                        /*
                            Get the search query from the URL. For example:
                            http://xss-example-page.nowhere/?q=Searching+for+things
                        */
                        var q = getQueryParameter('q');

                        if (q) {

                            search(q, function(error, results) {
                                showQueryAndResults(q, results);
                            });
                        }
                    });

                    function search(q, callback) {

                        // Fake results. We don't actually searching anything.
                        var results = [
                            'Result #1',
                            'Result #2',
                            'Result #3'
                        ];

                        callback(null, results);
                    }

                    function showQueryAndResults(q, results) {

                        var resultsEl = document.querySelector('#results');
                        var html = '';

                        html += '<p>Your search query:</p>';
                        html += '<pre>' + q + '</pre>';
                        html += '<ul>';

                        for (var index = 0; index < results.length; index++) {
                            html += '<li>' + results[index] + '</li>';
                        }

                        html += '</ul>';

                        resultsEl.innerHTML = html;
                    }

                    function getQueryParameter(name) {

                        var pairs = window.location.search.substring(1).split('&');
                        var pair;

                        for (var index = 0; index < pairs.length; index++) {

                            pair = pairs[index].split('=');

                            if (decodeURIComponent(pair[0]) === name) {
                                return decodeURIComponent(pair[1]);
                            }
                        }

                        return false;
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
                    XSS occurs by adding HTML or Javascript to a page via client side interaction. Try finding a list of payloads that might work from <a href="https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/XSS%20Injection#common-payloads" target="_blank"> PayloadAllTheThings</a>
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler2') .style.display=='none') {document.getElementById('spoiler2') .style.display=''}else{document.getElementById('spoiler2') .style.display='none'}">HINT 2</button>
                <div id="spoiler2" style="display:none">
                    Notice the URL changes when you perform a search; the 'q=' parameter is added when you search for something. This could be a good place to perform an XSS injection.
                    For an easy XSS proof of concept, try using an image reference tag that points to something that does not exist. Then, on an error, pop up an alert message box.
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler3') .style.display=='none') {document.getElementById('spoiler3') .style.display=''}else{document.getElementById('spoiler3') .style.display='none'}">HINT 3</button>
                <div id="spoiler3" style="display:none">
                    Remember to URL encode! <a href="https://meyerweb.com/eric/tools/dencoder/" target="_blank"> URL Encoder/Decoder</a>
                </div>

                <button class="button" title="Click to Show/Hide Content" type="button" onclick="if(document.getElementById('spoiler4') .style.display=='none') {document.getElementById('spoiler4') .style.display=''}else{document.getElementById('spoiler4') .style.display='none'}">REVEAL ANSWER</button>
                <div id="spoiler4" style="display:none">
                    Put this into the URL bar: <a href="/vulns/xss/welcome.php?q=%3Cimg%20src%3D%22does-not-exist%22%20onerror%3D%22alert('flag{dont_cross_me_son}')%22%3E">/vulns/xss/welcome.php?q=%3Cimg%20src%3D%22does-not-exist%22%20onerror%3D%22alert('flag{dont_cross_me_son}')%22%3E</a>
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
