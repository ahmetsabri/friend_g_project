<?php

return [

    'title' => 'AdminLTE 2',

    'title_prefix' => '',

    'title_postfix' => '',


    'logo' => '<b>Books Cpanel</b> ',

    'logo_mini' => '<b>B</b>ooks',


    'skin' => 'green',


    'layout' => null,


    'collapse_sidebar' => false,


    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',



    'menu' => [
        'Books ',
        [
            'text' => 'All books',
            'url'  => 'admin/books',
            'icon' =>'book'
        ],
        [
            'text'        => 'Reservations',
            'url'         => 'admin/reservations',
            'icon'        => 'file',
        ],

        ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],


    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
