<?php

function HTML_head($title, $print = false) {
    if (!$print && PRINTPAGE == true) {
        return;
    }
    print ('<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>'.$title.'</title>
    <link rel="shortcut icon" href="/docs/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="/docs/css/fonts.css">
    <link rel="stylesheet" href="/docs/css/colors.css">
    <link rel="stylesheet" href="/docs/css/layout.css">
    <link rel="stylesheet" href="/docs/css/styles.css">
    <link rel="stylesheet" href="/docs/css/solutions-style.css">

    <link rel="stylesheet" href="/docs/css/tooltip.css">
    <link rel="stylesheet" href="/docs/css/scroll-top.css">
    <link rel="stylesheet" href="/docs/css/tobii.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
');
}

function HTML_foot($print = false) {
    if (!$print && PRINTPAGE == true) {
        return;
    }
    if(localdevonly()) {
        print('<script type="text/javascript" src="http://livejs.com/live.js"></script>');
    }
    print('
    <script src="/docs/js/tooltip.js"></script>
    <script src="/docs/js/scroll-top.js"></script>
    <script src="/docs/js/tobii.min.js"></script>
    <script>
      const tobii = new Tobii();
    </script>
</body>
</html>
    ');
}