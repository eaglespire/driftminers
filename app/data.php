<?php

if (!function_exists('get_testimonials')){
    function get_testimonials(){
        return array(
            'slide_1'=>array(
                array(
                    'id'=>1,
                    'name'=>'Janet Orion',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'I really like Bitcoin. I own Bitcoins. It’s a store of value, a distributed ledger. It’s a great place to put assets, especially in places like Argentina with 40 percent inflation, where $1 today is worth 60 cents in a year, and a government’s currency does not hold value. It’s also a good investment vehicle if you have an appetite for risk. But it won’t be a currency until volatility slows down.',
                    'position'=>'Marketing Specialist',
                    'star_rating'=>4
                ),
                array(
                    'id'=>2,
                    'name'=>'Jason Lopez',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'Bitcoin is a remarkable cryptographic achievement and the ability to create something that is not duplicable in the digital world has enormous value.',
                    'position'=>'HRM',
                    'star_rating'=>4
                )
            ),
            'slide_2'=>array(
                array(
                    'id'=>1,
                    'name'=>'Joshua Gates',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'Bitcoin is a very exciting development, it might lead to a world currency. I think over the next decade it will grow to become one of the most important ways to pay for things and transfer assets.',
                    'position'=>'CTO',
                    'star_rating'=>4
                ),
                array(
                    'id'=>2,
                    'name'=>'Mary Riceman',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'Virtual Currencies may hold long-term promise, particularly if the innovations promote a faster, more secure and more efficient payment system.',
                    'position'=>'General Director',
                    'star_rating'=>4
                )
            ),
            'slide_3'=>array(
                array(
                    'id'=>1,
                    'name'=>'Mike Pence',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'If there is one positive takeaway from the collapse of Mt.Gox, it is the willingness of a new generation of.',
                    'position'=>'Product Designer',
                    'star_rating'=>4
                ),
                array(
                    'id'=>2,
                    'name'=>'Maxwell Ortega',
                    'image'=>'/assets/images/client-thumb-1.png',
                    'description'=>'If there is one positive takeaway from the collapse of Mt.Gox, it is the willingness of a new generation of.',
                    'position'=>'CEO & Founder',
                    'star_rating'=>5
                )
            ),
        );
    }
}
