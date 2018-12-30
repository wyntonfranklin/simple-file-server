<?php
return [
    "appName" => "My Simple Server",
    "baseDir" => dirname(__FILE__) . DIRECTORY_SEPARATOR. '../',
    "baseUrl" => "http://myserver.dev",
    "background" => "",
    "installed" => true,
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
        "" => [
            "password" => "",
        ],
        // add other users here
    ]
];