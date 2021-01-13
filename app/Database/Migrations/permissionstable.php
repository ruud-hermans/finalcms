<?php

return [
    'table_name' => 'permissions',

    'drop_scheme' => "DROP TABLE IF EXISTS `permissions`",

    'scheme' => "CREATE TABLE IF NOT EXISTS `permissions` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(80) NOT NULL,
        `created` timestamp NOT NULL,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;",

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'name'       => 'show_user',
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ],

        [
            'name'       => 'create_user',
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ],

        [
            'name'       => 'read_user',
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ],
        
        [
            'name'       => 'update_user',
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ],

        [
            'name'       => 'delete_user',
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ]),
    ],
];