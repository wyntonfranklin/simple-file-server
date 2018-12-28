<?php
return [
    "appName" => "Simple File Server",
    "baseDir" => dirname(__FILE__) . DIRECTORY_SEPARATOR. '../',
    "baseUrl" => "http://myserver.dev",
    "background" => "",
    'files' => [
        "maxUploadSize" => "10", // in mb
        "allowed" =>  [
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png",
            "pdf" => "application/pdf"
        ]
    ],
    "users" => [
        "admin" => [
            "password" => "Password12344",
            "hash" => "g9HK7CQjAExbJ0IW"
        ],
        "wynton" => [
            "password" => "Password",
            "hash" => "g9HK7CQjAExbJ0IW"
        ]
        // add other users here
    ]
];