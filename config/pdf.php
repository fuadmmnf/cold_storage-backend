<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
    'font_path'             => base_path('resources/fonts/'),
    'font_data'             => [

        'Kalpurush' => [
            'R'  => 'Kalpurush.ttf',    // regular font
            'B'  => 'Kalpurush.ttf',       // optional: bold font
            'I'  => 'Kalpurush.ttf',     // optional: italic font
            'BI' => 'Kalpurush.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
        'AdorshoLipi' => [
            'R'  => 'AdorshoLipi.ttf',    // regular font
            'B'  => 'AdorshoLipi.ttf',       // optional: bold font
            'I'  => 'AdorshoLipi.ttf',     // optional: italic font
            'BI' => 'AdorshoLipi.ttf', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]
        // ...add as many as you want.
    ]
];
