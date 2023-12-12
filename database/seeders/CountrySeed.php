<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\Schema;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Country::truncate();
        Schema::enableForeignKeyConstraints();
 $countries =[
[
'id'=>1,
'code'=>'AF',
'name'=>'{"en":"Afghanistan","ar":"\u0623\u0641\u063a\u0627\u0646\u0633\u062a\u0627\u0646"}',
'phone_code'=>93,
'phone_length'  =>2,
'currency'=> 'JOD', 
'status' => '1', 
'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg'
 ],
    [
'id'=>3,
'code'=>'DZ',
'name'=>'{"en":"Algeria","ar":"ألجيريا"}',
'phone_code'=>213,

'phone_length'  =>3,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],

[
'id'=>17,
'code'=>'BH',
'name'=>'{"en":"Bahrain","ar":"بحرين"}',
'phone_code'=>973,

'phone_length'  =>3,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>18,
'code'=>'BD',
'name'=>'{"en":"Bangladesh","ar":"بنغلاديش"}',
'phone_code'=>880,

'phone_length'  =>3,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],

[
'id'=>38,
'code'=>'CA',
'name'=>'{"en":"Canada","ar":"كندا"}',
'phone_code'=>1,

'phone_length'  =>1,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],

[
'id'=>44,
'code'=>'CN',
'name'=>'{"en":"China","ar":"الصين"}',
'phone_code'=>86,

'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>64,
'code'=>'EG',
'name'=>'{"en":"Egypt","ar":"مصر"}',
'phone_code'=>20,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],


[
'id'=>101,
'code'=>'IN',
'name'=>'{"en":"India","ar":"الهند"}',
'phone_code'=>91,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>103,
'code'=>'IR',
'name'=>'{"en":"Iran","ar":"ايران"}',
'phone_code'=>98,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>104,
'code'=>'IQ',
'name'=>'{"en":"Iraq","ar":"عراق"}',
'phone_code'=>964,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>109,
'code'=>'JP',
'name'=>'{"en":"Japan","ar":"االيابان"}',
'phone_code'=>81,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>111,
'code'=>'JO',
'name'=>'{"en":"Jordan","ar":"الأردن"}',
'phone_code'=>962,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>117,
'code'=>'KW',
'name'=>'{"en":"Kuwait","ar":"كويت"}',
'phone_code'=>965,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>121,
'code'=>'LB',
'name'=>'{"en":"Lebanon","ar":"لبنان"}',
'phone_code'=>961,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>124,
'code'=>'LY',
'name'=>'{"en":"Libya","ar":"ليبيا"}',
'phone_code'=>218,
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],

[
'id'=>148,
'code'=>'MA',
'name'=>'{"en":"Morocco","ar":"المغرب"}',
'phone_code'=>212,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>165,
'code'=>'OM',
'name'=>'{"en":"Oman","ar":"عمان"}',
'phone_code'=>968,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>166,
'code'=>'PK',
'name'=>'{"en":"Pakistan","ar":"باكستان"}',
'phone_code'=>92,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>168,
'code'=>'PS',
'name'=>'{"en":"Palestinian","ar":"فلسطين"}',
'phone_code'=>970,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>178,
'code'=>'QA',
'name'=>'{"en":"Qatar","ar":"قطر"}',
'phone_code'=>974,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>191,
'code'=>'SA',
'name'=>'{"en":"Saudi Arabia","ar":"السعودية"}',
'phone_code'=>966,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>207,
'code'=>'SD',
'name'=>'{"en":"Sudan","ar":"السودان"}',
'phone_code'=>249,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>213,
'code'=>'SY',
'name'=>'{"en":"Syria","ar":"سوريا"}',
'phone_code'=>963,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
 [
'id'=>222,
'code'=>'TN',
'name'=>'{"en":"Tunisia","ar":"تونس"}',
'phone_code'=>216,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>223,
'code'=>'TR',
'name'=>'{"en":"Turkey","ar":"تركيا"}',
'phone_code'=>90,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>229,
'code'=>'AE',
'name'=>'{"en":"United Arab Emirates","ar":"الامارات"}',
'phone_code'=>971,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ],
[
'id'=>243,
'code'=>'YE',
'name'=>'{"en":"Yemen","ar":"يمن"}',
'phone_code'=>967,
 
 
'phone_length'  =>2,
'currency'=> 'JOD', 'status' => '1', 'flag_url' => 'https://images-na.ssl-images-amazon.com/images/I/81Hh7lJWe5L._AC_SL1500_.jpg',
 ]
 ];   
        
        Country::insert($countries);
    }
}
