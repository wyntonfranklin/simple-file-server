<?php
return [
    "appName" => "Simple File Server",
    "baseDir" => dirname( dirname(__FILE__) ),
    "baseUrl" => "http://myserver.dev",
    "background" => "",
    "installed" => "false",
    "orderBy" => "name",
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
            "password" => "password1234",
        ],
        // add other users here
    ]
];