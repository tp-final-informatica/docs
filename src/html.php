<?php

function HTML_head($title) {
    print ("
<!DOCTYPE html>

<html lang=\"en\">
<head>
    <meta name=\"robots\" content=\"noindex\">
    <meta charset=\"UTF-8\">
    <title>${title}</title>
<link rel=\"stylesheet\" href=\"./css/fonts.css\">
<link rel=\"stylesheet\" href=\"./css/colors.css\">
<link rel=\"stylesheet\" href=\"./css/layout.css\">
<link rel=\"stylesheet\" href=\"./css/crossover-style.css\">
</head>
<body>
");
}

function HTML_foot() {
    print("
</body>
</html>");
}