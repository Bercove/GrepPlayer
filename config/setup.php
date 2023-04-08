<?php

return [

    /**
     * ! --------------------------------------------------------------------
     * ? User Defined Variables
     * ! --------------------------------------------------------------------
     * This is a set of variables that are made specific to this application.
     * It is better if they are all placed here rather than in .env file.
     *
     * ! Use this to get the values.
     * TODO Example config('setup.key')
     * ? @get config('setup.key')
     *
    //  * ! If they are nested use
     * TODO Example config('setup.key.key')
     * ? @get config('setup.key.key')
     *
     */
    'SITE_NAME' => 'Grep Player',
    'SITE_TITLE' => ' | Grep Player',
    '_SITE_TITLE' => ' | Grep Player',
    'SITE_TAG_LINE' => 'My Music, My Choice',
    'WEB_ADDRESS' => 'https://grepplayer.com',

    /**
     * ! Author
     */
    'AUTHOR' => [
        'NAME' => [
            'BERCOVE' => [
                'NICKNAME' => 'Bercove',
                'FIRST_NAME' => 'Umuhoza',
                'MIDDLE_NAME' => '',
                'LAST_NAME' => 'Bonheur',
                'ALL' => 'Umuhoza Bonheur',

                // ? Social Accounts
                'FACEBOOK' => 'bercove',
                'WHATSAPP' => '+250722353933',
                'INSTAGRAM' => 'bercove__',
                'TWITTER' => 'bercove__',
                'SNAPCHAT' => 'bercove.deb',
                'SKYPE' => 'bercove',
                'ART_STATION' => 'bercove',
                'TIKTOK' => 'Bercove',
                'GITHUB' => 'Bercove',
                'GITLAB' => 'Bercove',
                'HEROKU' => 'Bercove',
                'YOUTUBE' => 'Bercove',
                'PINTEREST' => 'Bercove'
            ],
        ],

        'EMAIL' => [
            'BERCOVE' => [
                'DEVELOPER' => 'bercove@gmail.com',
                'PERSONAL' => 'umuhozabonheur@gmail.com',
            ],
        ],

        'PHONE' => [
            'BERCOVE' => [
                'WhatsApp' => '+250722353933',
                'Call' => '+250783035107',
            ],
        ],
    ],

    /**
     * ? Cookies
     */
    'lang' => 'lang',
    'IPaddress' => 'IP',
    'userId' => 'uid',
    'search' => 'search',
    'session' => 'XSRF-TOKEN',
    'remember_web' => 'remember_web',

    /**
     * ! Var data
     */
    'defaultPassword' => 'bercove',

    /**
     * ! Forms
     */
    'REQUIRED_FIELD' => "A field with <code>*</code> is required",

];
