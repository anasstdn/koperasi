<?php

return [
    'role_structure' => [
        'developer' => [
            'users'                         => 'c,r,u,d',
            'acl'                           => 'c,r,u,d',
            'profile'                       => 'r,u',
            'home-menu'                     => 'r',
            'acl-menu'                      => 'r',
                'user'                      => 'r',
                'permission'                => 'r',
                'role'                      => 'r',
            'activity'                      => 'r',
            'master-menu'                   => 'r',
                'master-umum-menu'          => 'r',
                    'provinsi'              => 'r',
                    'kabupaten'             => 'r',
                    'kecamatan'             => 'r',
                    'kelurahan'             => 'r',
                    'status-perkawinan'     => 'r',
                    'agama'                 => 'r',
                    'jenis-kelamin'         => 'r',
                'master-kepegawaian-menu'   => 'r',
                    'departement'           => 'r',
                    'golongan'              => 'r',
                    'jabatan'               => 'r',
                'master-kas-menu'           => 'r',
                    'kategori-transaksi'    => 'r',
                    'jenis-transaksi'       => 'r',
            'pegawai'                       => 'r',
        ],
        'superadministrator' => [
            'users'                         => 'c,r,u,d',
            'acl'                           => 'c,r,u,d',
            'profile'                       => 'r,u',
            'home-menu'                     => 'r',
            'acl-menu'                      => 'r',
                'user'                      => 'r',
                'permission'                => 'r',
                'role'                      => 'r',
            'activity'                      => 'r',
            'master-menu'                   => 'r',
                'master-umum-menu'          => 'r',
                    'provinsi'              => 'r',
                    'kabupaten'             => 'r',
                    'kecamatan'             => 'r',
                    'kelurahan'             => 'r',
                    'status-perkawinan'     => 'r',
                    'agama'                 => 'r',
                    'jenis-kelamin'         => 'r',
                'master-kepegawaian-menu'   => 'r',
                    'departement'           => 'r',
                    'golongan'              => 'r',
                    'jabatan'               => 'r',
                'master-kas-menu'           => 'r',
                    'kategori-transaksi'    => 'r',
                    'jenis-transaksi'       => 'r',
            'pegawai'                       => 'r',
        ],
        // 'administrator' => [
        //     'users' => 'c,r,u,d',
        //     'profile' => 'r,u',
        //     'home-menu' => 'r'
        // ],
        'pengurus' => [
            'profile' => 'r,u',
            'home-menu' => 'r'
        ],
        'pengawas' => [
            'profile' => 'r,u',
            'home-menu' => 'r'
        ],
        'pengelola' => [
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
