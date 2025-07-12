<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | PMB Application Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration values specific to the PMB (Penerimaan
    | Mahasiswa Baru) application. You can modify these values to customize
    | the application behavior.
    |
    */

    'app_name' => env('PMB_APP_NAME', 'PMB Online - Universitas XYZ'),
    
    'academic_year' => env('PMB_ACADEMIC_YEAR', '2025/2026'),
    
    'university_name' => env('PMB_UNIVERSITY_NAME', 'Universitas XYZ'),
    
    /*
    |--------------------------------------------------------------------------
    | Registration Settings
    |--------------------------------------------------------------------------
    */
    
    'registration' => [
        'max_per_user' => 1,
        'auto_approve' => false,
        'require_admin_approval' => true,
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */
    
    'validation' => [
        'kewarganegaraan_options' => [
            'WNI Asli',
            'WNI Keturunan', 
            'WNA'
        ],
        
        'jenis_kelamin_options' => [
            'Pria',
            'Wanita'
        ],
        
        'status_menikah_options' => [
            'Belum menikah',
            'Menikah',
            'Lain-lain'
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | PDF Export Settings
    |--------------------------------------------------------------------------
    */
    
    'pdf' => [
        'orientation' => 'portrait',
        'size' => 'A4',
        'margin' => 10,
        'filename_prefix' => 'bukti-pendaftaran-',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Dashboard Settings
    |--------------------------------------------------------------------------
    */
    
    'dashboard' => [
        'items_per_page' => 10,
        'show_statistics' => true,
        'show_top_provinces' => 5,
    ],
    
];
