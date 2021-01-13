<?php

return [
    'table_name' => 'role_has_permission',

    'drop_scheme' => "DROP TABLE IF EXISTS `role_has_permission`",

    'scheme' => "CREATE TABLE IF NOT EXISTS `role_has_permission` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `role_id` int(11) NOT NULL,
        `permission_id` int(11) NOT NULL,
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
        'data' => array(
        [
            'role_id'       => 2,
            'permission_id' => 1,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],

        [
            'role_id'       => 2,
            'permission_id' => 2,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],
        
        [
            'role_id'       => 2,
            'permission_id' => 3,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ],

        [
            'role_id'       => 2,
            'permission_id' => 4,
            'created'       => date('Y-m-d H:i:s'),
            'created_by'    => 1
        ]),
    ],
];