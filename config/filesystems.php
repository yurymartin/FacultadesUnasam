<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
        'infoFile' => [
            'driver' => 'local',
            'root' => public_path('archivosExcel'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'perfil' => [
            'driver' => 'local',
            'root' => public_path('img/perfil'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'documentoGestion' => [
            'driver' => 'local',
            'root' => public_path('documentoGestion'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'banners' => [
            'driver' => 'local',
            'root' => public_path('img/banners'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'bannersF' => [
            'driver' => 'local',
            'root' => public_path('img/bannersFacultades'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'bannersE' => [
            'driver' => 'local',
            'root' => public_path('img/bannersEscuelas'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'agendarectorals' => [
            'driver' => 'local',
            'root' => public_path('img/agendarectorals'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'noticias' => [
            'driver' => 'local',
            'root' => public_path('img/noticias'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'instrumentos' => [
            'driver' => 'local',
            'root' => public_path('img/instrumentos'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'convocatorias' => [
            'driver' => 'local',
            'root' => public_path('img/convocatorias'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'galerias' => [
            'driver' => 'local',
            'root' => public_path('img/galerias'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],
         'eventos' => [
            'driver' => 'local',
            'root' => public_path('img/eventos'), // miproyecto.com/public/defaults/
            'visibility' => 'public',
         ],

    ],

];
