<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superAdministrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'provinces' => 'c,r,u,d',
            'districts' => 'c,r,u,d',
            'internships' => 'c,r,u,d'
        ],
        'ministryEducation' => [
            'profile' => 'r,u',
            'institutions' => 'c,r,u,d',
            'report' => 'r'
        ],
        'institution' => [
            'profile' => 'r,u',
            'students' => 'c,r,u,d',
            'teachers' => 'c,r,u,d',
            'institution' => 'r'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
