<?php
return array(
	'email' => array(
        'address' => array(
            'encoding' => 'utf-8',
            'from_email' => 'site@big5-test.com',
            'from_name' => 'Big5-Persönlichkeitstest',
            'reply_to' => 'reply@config.com',
            'reply_to_name' => 'replyName Config',
            'support' => 'support@big5-test.com',
            'admin' => 'admin@big5-test.com'
        ),
        'content' => array(
            'template_path_stack' => array(
                realpath(__DIR__ . '/../view/email/')
            ),
            'mimeType' => 'html',
            'layout_name' => 'default',
            'template_name' => 'default',
            'template_var' => 'content',
            'template_vars' => array(
                'company' => 'Big5-Persönlichkeitstest',
                'slogan' => 'Hier und Jetzt und für Immer',
                'baseUrl' => 'http://www.big5-test.com/'
            ),
        ),
        'folder' => array(
            'content' => array(
                'subject' => '/content/subject/',
                'txt' => '/content/body/txt/',
                'html' => '/content/body/html/',
            ),
            'layout' => array(
                'txt' => '/layout/txt/',
                'html' => '/layout/html/',
            ),
        ),
        'transport' => array(
            'transportMethod' => 'smtp',
		),
	),
);