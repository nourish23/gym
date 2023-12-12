<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Plan;
use Illuminate\Support\Facades\Schema;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        $cat1 = Category::create([

            'title' => [
                      'en' => 'Fitness',
                      'ar' => 'لياقة بدنية'
                   ],
            'description' => [
                      'en' => '',
                      'ar' => ''
                   ],
            "status"=> "1"
        ]);

        $cat2 =  Category::create([
            'title' => [
                      'en' => 'Nutrition',
                      'ar' => 'تَغذِيَة'
                   ],

            'description' => [
                      'en' => '',
                      'ar' => ''
                   ],          
             "status"=> "1"
        ]);

        $cat3 = Category::create([

            'title' => [
                      'en' => 'Fitness+Nutrition',
                      'ar' => 'لياقة بدنية + تغذية'
                   ],

            'description' => [
                      'en' => '',
                      'ar' => ''
                   ],           
            "status"=> "1"
        ]);

        
        Schema::disableForeignKeyConstraints();
        Plan::truncate();
        Schema::enableForeignKeyConstraints();
        Plan::create([
            'title' => [
                      'en' => '1 Month Plan',
                      'ar' => 'شهر واحد'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "200",
            "period" => "1",
            "category_id" => $cat1->id,
        ]);

        Plan::create([
            'title' => [
                      'en' => '3 Month Plan',
                      'ar' => '3 اشهر'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "500",
            "period" => "3",
            "category_id" => $cat1->id,
        ]);

        Plan::create([
            'title' => [
                      'en' => '1 Year Plan',
                      'ar' => 'سنة كاملة'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "1600",
            "period" => "12",
            "category_id" => $cat1->id,
        ]);

        // ----------------------------

        Plan::create([
            'title' => [
                      'en' => '1 Month Plan',
                      'ar' => 'شهر واحد'
                   ],
            "description" => [
                      'en' => '<ul>
                              <li><i class="bi bi-dot"></i> <span>Weekly meal plans and follow-up</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>All fitness classes included</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Various set of classes</span></li>
                           
                        </ul>',
                      'ar' => '<ul>
                              <li><i class="bi bi-dot"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>
                           
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "350",
            "period" => "1",
            "category_id" => $cat2->id,
        ]);

        Plan::create([
            'title' => [
                      'en' => '3 Month Plan',
                      'ar' => '3 اشهر'
                   ],
            "description" => [
                      'en' => '<ul>
                             <li><i class="bi bi-dot"></i> <span>Weekly meal plans and follow-up</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>All fitness classes included</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Various set of classes</span></li>
                           
                        </ul>',
                      'ar' => '<ul>
                             <li><i class="bi bi-dot"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>
                           
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "900",
            "period" => "3",
            "category_id" => $cat2->id,
        ]);

        //--------------------

        Plan::create([
            'title' => [
                      'en' => '1 Month Plan',
                      'ar' => 'شهر واحد'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-dot"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "400",
            "period" => "1",
            "category_id" => $cat3->id,
        ]);

        Plan::create([
            'title' => [
                      'en' => '3 Month Plan',
                      'ar' => '3 اشهر'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-dot"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "900",
            "period" => "3",
            "category_id" => $cat3->id,
        ]);

        Plan::create([
            'title' => [
                      'en' => '1 Year Plan',
                      'ar' => 'سنة كاملة'
                   ],
            "description" => [
                      'en' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>All fitness classes included</span></li>
                            <li><i class="bi bi-dot"></i> <span>Various set of classes</span></li>

                            
                            <li class="na"><i class="bi bi-x"></i> <span>Weekly meal plans and follow-up</span></li>
                        </ul>',
                      'ar' => '<ul>
                            <li><i class="bi bi-dot"></i> <span>تشمل جميع الحصص الرياضية الجماعية </span></li>
                            <li><i class="bi bi-dot"></i> <span>مجموعة متنوعة من الحصص الرياضية</span></li>

                            
                            <li class="na"><i class="bi bi-dot"></i> <span>جدول غذائي أسبوعي ومتابعة دورية</span></li>
                        </ul>'
                   ],
            "image"=> "#",
            "is_free" => "0",
            "price" => "3200",
            "period" => "12",
            "category_id" => $cat3->id,
        ]);
    }
}
