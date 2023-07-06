<?php
return [
    'temp_dir' => storage_path('app/dompdf'), // Set a temporary directory for Dompdf
    'font_dir' => storage_path('fonts/'), // Set the directory where your fonts are stored
    'font_cache' => storage_path('app/dompdf/fontcache'), // Set a cache directory for Dompdf fonts
    'chroot' => base_path(), // Set the base path for Dompdf
    'default_font' => 'Arial', // Set the default font for Dompdf
];
