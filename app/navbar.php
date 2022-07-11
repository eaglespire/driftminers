<?php

if (!function_exists('admin_menu_items')){
    function admin_menu_items(): array
    {
        //        return collect($arr)->map(function ($item){
//            return (object) $item;
//        });
        return array(
            [
                'id'=>1,
                'link'=>route('admin_home'),
                'title'=>'Dashboard',
                'icon'=>"nav-icon fas fa-tachometer-alt" ,
                'icon_2'=>null,
                'sub'=>null
            ],
            [
                'id'=>2,
                'link'=>route('subscribers'),
                'title'=>'Subscribers',
                'icon'=>"nav-icon fas fa-users" ,
                'icon_2'=>null,
                'sub'=>null
            ],

            [
                'id'=>3,
                'link'=>route('faq'),
                'title'=>"Pages",
                'icon'=>'nav-icon fas fa-book' ,
                'icon_2'=>'fas fa-angle-left right',
                'sub'=>array(
                    [
                        'id'=>1,
                        'link'=>route('contact'),
                        'title'=>'Home',
                        'icon'=>'far fa-circle nav-icon' ,
                    ]
                )
            ],
            [
                'id'=>4,
                'link'=>route('all_plans'),
                'title'=>"Plans",
                'icon'=>'nav-icon fas fa-book' ,
                'icon_2'=>'fas fa-angle-left right',
                'sub'=>array(
                    [
                        'id'=>1,
                        'link'=>route('create_plans'),
                        'title'=>'Create Plan',
                        'icon'=>'far fa-circle nav-icon' ,
                    ],
                    [
                        'id'=>2,
                        'link'=>route('all_plans'),
                        'title'=>'All Plans',
                        'icon'=>'far fa-circle nav-icon' ,
                    ],
                )
            ],
        );
    }
}

if (!function_exists('set_active_class')){
    function set_active_class($currentRoute): ?string
    {
        if ($currentRoute == url()->current()){
            return 'active';
        }
        return null;
    }
}
