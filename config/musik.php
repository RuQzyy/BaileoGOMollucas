<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TOTOBUANG — Mapping nada → piringan / posisi tabuhan
    |--------------------------------------------------------------------------
    | Totobuang khas Maluku umumnya memakai 10 piringan bernada diatonik.
    | Saya sesuaikan nama pukulan → lebih etnik.
    */

    'totobuang' => [
        'C'  => 'Piringan 1 (Nada C)',
        'C#' => 'Piringan 2 (Nada C#)',
        'D'  => 'Piringan 3 (Nada D)',
        'D#' => 'Piringan 4 (Nada D#)',
        'E'  => 'Piringan 5 (Nada E)',
        'F'  => 'Piringan 6 (Nada F)',
        'F#' => 'Piringan 7 (Nada F#)',
        'G'  => 'Piringan 8 (Nada G)',
        'G#' => 'Piringan 9 (Nada G#)',
        'A'  => 'Piringan 10 (Nada A)',
        'A#' => 'Pukulan nada tinggi (A#)',
        'B'  => 'Pukulan nada tinggi (B)',
    ],


    /*
    |--------------------------------------------------------------------------
    | TIFA — Range berdasarkan karakter suara Tifa Maluku
    |--------------------------------------------------------------------------
    | - Tifa Bass   → pukulan badan tengah (deep, bulat)
    | - Tifa Tengah → pukulan badan atas
    | - Tifa Tepi   → pukulan rim/tepi (tinggi)
    */

    // Range dalam Hz (disesuaikan dengan karakter Tifa Maluku)
    'tifa_ranges' => [
        'bass'   => [60, 150],     // suara bulat, dalam
        'tengah' => [150, 260],    // suara pukulan umum
        'tepi'   => [260, 500],    // suara keras, tinggi, rim-shot
    ],

    'tifa' => [
        'bass'   => 'Pukulan Tifa Bass',
        'tengah' => 'Pukulan Tifa Tengah',
        'tepi'   => 'Pukulan Tifa Tepi',
    ],


    /*
    |--------------------------------------------------------------------------
    | SULING BAMBU MALUKU — Fingering khas suling bambu daerah
    |--------------------------------------------------------------------------
    | Disesuaikan lebih dekat ke pola tiupan suling bambu timur Indonesia.
    */

    'suling' => [
        'C'  => 'Suling Nada C — Semua lubang tertutup (Do)',
        'C#' => 'Suling Nada C# — 1 lubang bawah dibuka',
        'D'  => 'Suling Nada D — 2 lubang bawah dibuka',
        'D#' => 'Suling Nada D# — 3 lubang bawah dibuka',
        'E'  => 'Suling Nada E — 4 lubang bawah dibuka',
        'F'  => 'Suling Nada F — 1 lubang atas dibuka, lainnya tutup',
        'F#' => 'Suling Nada F# — Kombinasi 2 atas terbuka',
        'G'  => 'Suling Nada G — 3 atas terbuka (G khas Maluku)',
        'G#' => 'Suling Nada G# — Variasi buka-tutup setengah',
        'A'  => 'Suling Nada A — Hampir semua lubang terbuka kecuali 1',
        'A#' => 'Suling Nada A# — Teknik setengah lubang',
        'B'  => 'Suling Nada B — Semua lubang terbuka',
    ],

];
