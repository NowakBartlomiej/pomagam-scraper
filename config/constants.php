<?php

return [
    'regex' => [
        'title' => '/(?<=title=\").*?(?=\")/',
        'slug' => '/(?<=href=\").*?(?=\")/',
        'image' => '/(?<=src=\").*?(?=\")/',
        'alt' => '/(?<=alt=\").*?(?=\")/',
        'number_id' => '/(?<=id=\").*?(?=\")/',
        'amount' => '/(?<=>).*?(?=zł)/',
    ],

    'category' => [
        'popular' => 'popularne',
        'treatment' => 'leczenie',
        'needs' => 'potrzeby',
        'animals' => 'zwierzeta',
        'projects' => 'projekty'
    ]
];