<?php

$sitemap = [
    "Carátula" => [
        'url'=>"/docs/index.html",
    ],
    "El sistema" => [
        'url'=>"/docs/macro.html",
    ],
    "Manual de uso del Administrador" => [
        'url'=>'/docs/web-interface.html',
    ],
    "Manual de uso del médico" => [
//        'url'=>'/docs/mobile.html',
    ],
    "El core" => [
        'url'=> '/docs/core.html',
        'subitems' => [
            "Comparación de lenguajes para el desarrollo del algoritmo" => "/docs/core/languages.html",
            "El algoritmo empleado" => "/docs/core/algorithm.html",
            "Especificaciones técnicas" => "/docs/core/specs.html",
            "Análisis de datos obtenidos" => "/docs/core/data.html"
        ],
    ],
    "Documento de Arquitectura" => [
        'url'=>'/docs/documentation.html',
    ],
//    "Información complementaria" => [
////        'url'=>'/docs/more.html',
//    ],
    "Bibliografía consultada" => [
        'url'=>"/docs/literature.html",
    ],
];