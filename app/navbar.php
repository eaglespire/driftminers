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
                'link'=>route('users.all'),
                'title'=>"Users",
                'icon'=>'nav-icon fas fa-users' ,
                'icon_2'=>'fas fa-angle-left right',
                'sub'=>array(
                    [
                        'id'=>1,
                        'link'=>route('users.create'),
                        'title'=>'Create New User',
                        'icon'=>'far fa-circle nav-icon' ,
                    ],
                    [
                        'id'=>2,
                        'link'=>route('users.all'),
                        'title'=>'All Users',
                        'icon'=>'far fa-circle nav-icon' ,
                    ],
                )
            ],
            [
                'id'=>3,
                'link'=>route('subscribers'),
                'title'=>'Subscribers',
                'icon'=>"nav-icon fas fa-users" ,
                'icon_2'=>null,
                'sub'=>null
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
            [
                'id'=>5,
                'link'=>route('messages.index'),
                'title'=>'Withdraw Requests',
                'icon'=>"nav-icon fas fa-comment-dollar" ,
                'icon_2'=>null,
                'sub'=>null
            ],
            [
                'id'=>6,
                'link'=>route('settings.index'),
                'title'=>'Settings',
                'icon'=>"nav-icon fas fa-cog" ,
                'icon_2'=>null,
                'sub'=>null
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
