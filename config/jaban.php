<?php

// Use this script to upload these into DB
// $typeOfActivityArray = config('jaban.profile.sector.construction.type_of_activity');
// foreach ($typeOfActivityArray as $typeOfActivityItem) {
//     $conActObj = App\Models\Construction\ConAct::create([
//         'title' => $typeOfActivityItem['title']
//     ]);
//     foreach ($typeOfActivityItem['value'] as $gpr) {
//         App\Models\Construction\ConGrp::insert([
//             'con_act_id' => $conActObj->id,
//             'title' => $gpr['title'],
//         ]);
//     }
// }

return [
    'profile' => [
        'sector' => [
            'construction' => [
                'type_of_activity' => [
                    [
                        'id' => 1,
                        'title' => 'استخدام',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'کارفرما',
                            ],
                            [
                                'id' => 2,
                                'title' => 'کارجو',
                            ]
                        ]
                    ],
                    [
                        'id' => 2,
                        'title' => 'استادکاران و کارگران ساختمانی ',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'استادکاران و کارگران ساختمانی ',
                            ],
                        ]
                    ],
                    [
                        'id' => 3,
                        'title' => 'مهندسین و متخصصین',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'مهندسین و متخصصین',
                            ],
                        ]
                    ],
                    [
                        'id' => 4,
                        'title' => 'انبوه سازان',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'انبوه سازان شرکتی',
                            ],
                            [
                                'id' => 2,
                                'title' => 'انبوه سازان شخصی',
                            ],
                        ]
                    ],
                    [
                        'id' => 5,
                        'title' => 'معرفی کسب و کارها',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'شرکت ها',
                            ],
                            [
                                'id' => 2,
                                'title' => 'فروشگاه ها',
                            ],
                            [
                                'id' => 3,
                                'title' => 'دفاتر طراحی و مهندسی',
                            ],
                            [
                                'id' => 4,
                                'title' => 'پیمانکاران شخصی',
                            ],
                            [
                                'id' => 5,
                                'title' => 'ماشین آلات',
                            ],
                            [
                                'id' => 6,
                                'title' => 'آزمایشگاه ها',
                            ],
                        ]
                    ],
                    [
                        'id' => 6,
                        'title' => 'پروژه ها',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'معرفی و برندینگ پروژه ها',
                            ],
                        ]
                    ],
                    [
                        'id' => 7,
                        'title' => 'شراکت و سرمایه گذاری',
                        'value' => [
                            [
                                'id' => 1,
                                'title' => 'تقاضای جذب سرمایه و یا شراکت در پروژه را دارد',
                            ],
                            [
                                'id' => 1,
                                'title' => 'تقاضای سرمایه گذاری در پروژه را دارد',
                            ],
                        ]
                    ],
                ]
            ]
        ]
    ],
];    