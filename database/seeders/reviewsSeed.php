<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use Illuminate\Support\Facades\Schema;

class reviewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();
        Review::create([

            'name' => [
                      'en' => 'NOURISH FITNESS VIRTUAL GYM',
                      'ar' => 'نوريش فيتنس الصالة الرياضية الافتراضية'
                   ],
            'text' => [
                      'en' => "The most important thing is the impact of Norish on our lives..
Each of us has a story..as if I remember Alaa (of course!) She told me about Norish and I joined without hesitation
How can I describe the difference
Before and after my engagement with Norish
Much much improved
(psychologically and physically)
Have you spent years with Norish?
And I don't have any readiness to go back to the world of games!
Basically, thanks for the idea
Thank you!
And thanks to the best coaches
And their tiredness with us
And all the love to my sisters heroes
God save our little family",
                      'ar' => "كثر اشي بنسبة لتاثير نوريش على حياتنا..
كل وحدة منا عندها قصة.., و كانه بتذكر آلاء (طبعًا!) حكتلي عن نوريش و انضميت بدون تردد 
بقدرش اوصف الفرق 
قبل و بعد إلتزامي مع نوريش 
كثير كثير تحسنت 
(نفسيًا وجسديًا) 
وهلا صرلي سنين مع نوريش 
و ماعندي اي استعداد ارجع لعالم الجيمز!
شكرًا ميساء عالفكرة أساسًا 
ممنونين لك!
و شكرًا لاحلى طاقم مدربات 
و تعبهم معنا
و كل الحب لاخواتي الابطال 
الله يحفظ عائلتنا الصغيرة'"
                   ],
            "status"=> "1",
            "image" => "#"
        ]);



        Review::create([

            'name' => [
                      'en' => 'NOURISH FITNESS VIRTUAL GYM',
                      'ar' => 'نوريش فيتنس الصالة الرياضية الافتراضية'
                   ],
            'text' => [
                      'en' => "I can be one of the oldest participants in Norish, and I consider it the best step I have taken in my life... I want to talk about my experience from the exact time of Corona and the quarantine that happened. Tired is the sport with Norish at a time when everything was intoxicating.
And then I continued with them, because it is the easiest way for a working mother and she has young children to play because all my energy is spent in the evening after work. I start to be lazy. I start the car and go to the gym... Quite simply, the gym is in my house, thank God.. And the best of all is a group that is all cooperative sisters, we encourage and strengthen each other Let's go back to our energy and vitality.... Actually, even if I'm gone and didn't register for a while or I'm lazy, I'll go back to register again because it has become an important part of my life..
Thank you Norish, thank you Maisa, thank you to the best participants and sisters, and God willing, everyone will stay healthy and well, and with this sweet positive energy that does not end",
                      'ar' => "انا يمكن من أقدم المشتركات بنوريش و بعتبرها أحلى خطوة عملتها بحياتي ...بدي أحكي عن تجربتي من وقت الكورونا بالضبط و الحجر اللي صار ، بلش يصير عندي ضيق نفس و بالذات لمى يتطبق الحجر بالبيوت ، الاشي الوحيد اللي رجعلي طاقتي الايجابية و نفسيتي اللي كانت تعبانة هي الرياضة مع نوريش بوقت كان كل شي مسكر . 
و بعدين كملت معهم لانه  أسهل طريقة لأم  عاملة و عندها صغار تلعب لانه  كل طاقتي بتخلص المسا بعد الشغل ببلش الكسل إني أشغل السيارة و أروح جيم ...بكل بساطة الجيم ببيتي الحمدلله ..و الأحلى من هيك جروب كله خوات متعاونات بنشجع بعض و بنقوي بعض لنرجع لطاقتنا و حيويتنا ....و فعليا حتى لو غبت و ما سجلت لفترة أو كسلت على طول برجع أسجل مرة تانية لانه صار جزء مهم  من حياتي ..
شكرا نوريش ، شكرا ميسا ، شكرا لأحلى مشتركات و اخوات و ان شالله الكل يضل بصحته و عافيته وبهالطاقة الايجابية الحلوة اللي ما بتخلص"
                                         ],
            "status"=> "1",
            "image" => "#"
        ]);



        Review::create([

            'name' => [
                      'en' => 'NOURISH FITNESS VIRTUAL GYM',
                      'ar' => 'نوريش فيتنس الصالة الرياضية الافتراضية'
                   ],
            'text' => [
                      'en' => "I can renew my participation and I am very happy that I have returned to the sport, because since I worked out, I no longer have the energy or the time, and the whole diet has become wrong
It's all late and ready and skip for at least two meals during the day
Then I got pregnant and gave birth, and I started to go out and walk and play sports like in the past
Because since I was in school, I am always in the gym, and I love sports a lot
And God guides her to goodness, so a joy saved me and led me to this sweet group, and I came back excited and playing and trying as much as I could not to miss classes
And the girls are the finest, and I am happy that I am with you
And the coaches are a lot, they are good and generous, and they give from their hearts",
                      'ar' => "انا يمكن أجدد مشتركة ومبسوطة كتير انه رجعت للرياضة لانه من لما اشتغلت بطل لا عندي طاقة ولا وقت و صار كل نظام اكلي غلط 
كله متأخر وجاهز و skip لوجبتين عالاقل خلال النهار 
وبعدها حملت وولدت و بطل في وقت بزيادة انزل وامشي والعب رياضة زي زمان
لانه من وانا بالمدرسة وانا دايما بالجيم وبحب الرياضة كتير 
والله يدلها عالخير فروحة أنقذتني و دلتني عهاالجروب الحلو و رجعت تحمست و ألعب وأحاول قد ما أقدر ما أضيع حصص 
و البنات من أرقى ما يكون ومبسوطة اني معكم
والكوتشز كتير كتير شطورين و مناح و بيعطوا من قلبهم"
                                         ],
            "status"=> "1",
            "image" => "#"
        ]);



        Review::create([

            'name' => [
                      'en' => 'NOURISH FITNESS VIRTUAL GYM',
                      'ar' => 'نوريش فيتنس الصالة الرياضية الافتراضية'
                   ],
            'text' => [
                      'en' => "From this site, I would like to tell you something. I have been playing with Norish since it opened almost at the beginning. I said to try a month and see that the classes are definitely not going to be like the gym club. I also participated with the wonderful nutritionist, Maisa. But I was surprised. The clubs and I continued with Norish every day. I made progress in my health and my body, and I am not ready to leave him because his classes are varied and the times satisfy everyone’s desires. The coaches give the best they have and do not match their smartness. They watch our games as if they were with them. As for the girls, my tongue fails because I consider them my second family. We encourage each other, get excited about each other, and check each other. Of course, for giving me this wonderful opportunity, and I am with you always, I love you",
                      'ar' => "من هاد الموقع حابة احكي شغلة انا بلعب مع نوريش من اول مافتح تقريبا بالبدايه قلت اجرب شهر واشوف الحصص اكيد مش راح تكون زي النادي الرياضي وكمان اشتركت مع اخصائية التغذية الرائعه ميسا لكني تفاجأت   الحصص روعه والمدربات ولا اروع والفضل طبعا كله للغاليه ميسا وجهودها وافكارها وبعدها فتحت النوادي واستمريت مع نوريش كل يوم احرز تقدم بصحتي بجسمي ومش مستعده اتركه لان حصصه متنوعه واوقات ترضي رغبات الجميع ومدربات يعطون احلى ماعندهم ومافي زي شطارتهم وبيراقبو لعبنا وكأنو معاهم اما الصبايا فيعجز لساني لاني بعتبرهم عيلتي الثانيه بنشجع بعض ونحمس بعض ونتفقد بعض كلمة شكر لنوريش واكيد ميسا طبعا على منحي هاد الفرصة الرائعه وانا معاكم دايما بحبكم"
                                         ],
            "status"=> "1",
            "image" => "#"
        ]);



        Review::create([

            'name' => [
                      'en' => 'NOURISH FITNESS VIRTUAL GYM',
                      'ar' => 'نوريش فيتنس الصالة الرياضية الافتراضية'
                   ],
            'text' => [
                      'en' => "May God bless you all, through my experience with Norish, it was a wonderful experience, the trainers are very wonderful, especially since I am an employee, and I cannot go to the gym because of my long shifts, so I return home tired, and there is no time for me to go. This group is easy for me to continue playing, exercising, and maintaining my fitness. My body fitness Thank you very much to the sweet Maysa for making such a wonderful group, and thank you also for the efficient trainers, and for the effort they made with us, and thank you for participating with us in the groups and for the continuous encouragement to play.
God willing, we will continue to communicate with each other, with all respect and love for all of you",
                      'ar' => "يعطيكم العافيه جميعا، من خلال تجربتي مع نوريش،  كان تجربة رائعة ، المدربات جدا رائعين  وخاصه اني موظفه ،وما بقدر اروح للجمات بسبب دوامي الطويل فبرجع للبيت متعبه، وما في، وقت انه اروح جم هاد الجروب سهل علي الاستمرار اللعب ،والرياضه، والمحافظه على لياقة جسمي شكرا كتيييير للحلوه ميساء على عمل هيك جروب رائع ، وشكرا أيضا على المدربات الكفؤ، وعلى المجهود الي ببذلوه معنا، وشكرا على المشاركات معنا بالقروب على التشجيع المستمر للعب. 
إن شاء الله منضل على تواصل مع بعض، مع كل الاحترام والحب الكم جميعا "
                                         ],
            "status"=> "1",
            "image" => "#"
        ]);
        
    }
}
