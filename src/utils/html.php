<?php

function HTML_head($title) {
    print ("
<!DOCTYPE html>

<html lang=\"es\">
<head>
    <meta name=\"robots\" content=\"noindex\">
    <meta charset=\"UTF-8\">
    <title>${title}</title>
    <link rel=\"stylesheet\" href=\"./css/fonts.css\">
    <link rel=\"stylesheet\" href=\"./css/colors.css\">
    <link rel=\"stylesheet\" href=\"./css/layout.css\">
    <link rel=\"stylesheet\" href=\"./css/styles.css\">
    <link rel=\"stylesheet\" href=\"./css/solutions-style.css\">

    <link rel=\"stylesheet\" href=\"./css/tooltip.css\">
    <link rel=\"stylesheet\" href=\"./css/scroll-top.css\">
    
</head>
<body>
");
}

function HTML_foot() {
    if(localdevonly()) {
        print('<script type="text/javascript" src="http://livejs.com/live.js"></script>');
    }
    print("
    <script src=\"./js/tooltip.js\"></script>
    <script src=\"./js/scroll-top.js\"></script>
</body>
</html>");
}