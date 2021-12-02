<?php

return [

    'backup' => [

        /*
         * The name of this application. You can use this name to monitor
         * the backups.
         */
        'name' => env('APP_NAME', 'Ebilling'),
   
        'source' => [
   
            'files' => [
   
                /*
                 * The list of directories and files that will be included in the backup.
                 */
                'include' => [
                    base_path(),
                ],
   
                /*
                 * These directories and files will be excluded from the backup.
                 */
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],
   
                /*
                 * Determines if symlinks should be followed.
                 */
                'follow_links' => false,
   
               /*
                * This path is used to make directories in resulting zip-file relative
                * Set to false to include complete absolute path
                * Example: base_path()
                */
               'relative_path' => false,
            ],
   
            /*
             * The names of the connections to the databases that should be backed up
             * MySQL, PostgreSQL, SQLite and Mongo databases are supported.
             */
            'databases' => [
                'mysql',
            ],
        ],
   
        'destination' => [
   
            /*
             * The disk names on which the backups will be stored.
             */
            'disks' => [
                'local',
            ],
        ],
    ]
    ];