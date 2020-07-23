<?php

return [
    'role_structure' => [
        'developer' => [
            'users'                 => 'c,r,u,d',
            'acl'                   => 'c,r,u,d',
            'profile'               => 'r,u',
            'home-menu'             => 'r',
            'acl-menu'              => 'r',
                'user'              => 'r',
                'permission'        => 'r',
                'role'              => 'r',
            'activity'              => 'r',
            'master-menu'           => 'r',
                'master-umum-menu'  => 'r',
                    'provinsi'      => 'r',
                    'kabupaten'     => 'r',
        ],
        'superadministrator' => [
            'users'                 => 'c,r,u,d',
            'acl'                   => 'c,r,u,d',
            'profile'               => 'r,u',
            'home-menu'             => 'r',
            'acl-menu'              => 'r',
                'user'              => 'r',
                'permission'        => 'r',
                'role'              => 'r',
            'activity'              => 'r',
            'master-menu'           => 'r',
                'master-umum-menu'  => 'r',
                    'provinsi'      => 'r',
                    'kabupaten'     => 'r',
        ],
        // 'administrator' => [
        //     'users' => 'c,r,u,d',
        //     'profile' => 'r,u',
        //     'home-menu' => 'r'
        // ],
        'pimpinan' => [
            'profile' => 'r,u',
            'home-menu' => 'r'
        ],
        'staff' => [
            'profile' => 'r,u',
            'home-menu' => 'r'
        ],
    ],
    'permission_structure' => [
        // 'cru_user' => [
        //     'profile' => 'c,r,u'
        // ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
