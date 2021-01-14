<?php

return [
    'table_name' => 'formtokens',

    'drop_scheme' => "DROP TABLE IF EXISTS `formtokens`",

    'scheme' => "CREATE TABLE IF NOT EXISTS `formtokens` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `ip_address` varchar(15) NOT NULL,
        `token` varchar(255) NOT NULL,
        `created` timestamp NOT NULL,
        `created_by` int(11),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;",
];