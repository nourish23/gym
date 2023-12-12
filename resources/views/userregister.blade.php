@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/register-style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
@php $locale = App::getLocale(); @endphp
<section>
    <div class="wrapper">
        <div class="inner">

            <form action="postregister" id="register" method="POST">
                @csrf
                <h3>@lang('registration.title')</h3>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="@lang('registration.first_name')" name="first_name" value="{{ old('first_name') }}" />
                        @error('first_name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="@lang('registration.last_name')" name="last_name" value="{{ old('last_name') }}" />
                        @error('last_name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="@lang('registration.email')" name="email" value="{{ old('email') }}" />
                        @error('email')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" min="18" max="100" class="form-control" placeholder="@lang('registration.age')" name="age" value="{{ old('age') }}" />
                        @error('age')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group form-holder">
                        <select onchange="drawcode()" id="country" name="countries" class="form-control" placeholder="@lang('registration.country')" value="{{ old('countries') }}">
                            <option value="" selected disabled>@lang('registration.country')</option>
                            @foreach ($data['countries'] as $country)

                                <option value="{{ $country->id }}" @if ($country->id == old('countries')) selected @endif>
                                    {{$country->phone_code}} - {{ $country->getTranslation('name', $locale, true) }}</option>
                            @endforeach
                        </select>
                        @error('countries')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <span id="count_code" style="width: 18%;border: 1px solid #ddd;border-radius: 5px;display: inline-block;vertical-align:bottom;text-align:center;line-height: 44px">--</span>
                        <input style="max-width: 77%;display: inline-block;margin: 0px" type="text" class="form-control" placeholder="@lang('registration.phone')" name="phone_number" value="{{ old('phone_number') }}" />
                        @error('phone_number')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="@lang('registration.pass')" value="{{ old('password') }}" />
                        @error('password')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('registration.confirm_pass')" value="{{ old('password_confirmation') }}" />
                        @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row flex-nowrap">
                    <div class="form-group form-holder">
                        <select name="services" id class="form-control" value="{{ old('services') }}">
                            <option value disabled selected>@lang('registration.service')</option>
                            <option @if (old('services')=='2' ) selected @endif value="2">@lang('registration.service_option_1')
                            </option>
                            <option @if (old('services')=='1' ) selected @endif value="1">@lang('registration.service_option_2')
                            </option>
                            <option @if (old('services')=='3' ) selected @endif value="3">
                                @lang('registration.service_option_3')
                            </option>
                        </select>
                        @error('services')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-holder">
                        <select name="subscription" id class="form-control">
                            <option value disabled selected>@lang('registration.period')</option>
                            <option @if (old('subscription')=='1' ) selected @endif value="1">@lang('registration.period_option_1')
                            </option>
                            <option @if (old('subscription')=='3' ) selected @endif value="3">@lang('registration.period_option_2')
                            </option>
                            <option @if (old('subscription')=='12' ) selected @endif value="12">@lang('registration.period_option_3')
                            </option>
                        </select>
                        @error('subscription')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <textarea placeholder="@lang('registration.q3')" class="form-control" style="height: 130px" name="diseases_symptoms"></textarea>
                    @error('diseases_symptoms')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea placeholder="@lang('registration.q1')" class="form-control" style="height: 130px" name="do_you_have_anything_else_to_tell_us_about"></textarea>
                    @error('do_you_have_anything_else_to_tell_us_about')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea placeholder="@lang('registration.q2')" class="form-control" style="height: 130px" name="how_did_you_hear_about_us"></textarea>
                    @error('how_did_you_hear_about_us')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="termsAndConditionsCheckbox"  name="terms_and_conditions_acceptance" required />
                    <label class="form-check-label" for="termsAndConditionsCheckbox">
                        @lang('registration.terms_label_part1')
                        <a href="javascript:void(0);" id="termsLink">@lang('registration.terms_label_part2')</a>
                    </label>

                    @error('terms_and_conditions_acceptance')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="policy" name="policy" required />
                    <label class="form-check-label" for="policy">
                        @lang('registration.terms_label_part3')
                        <a href="{{ route('privacy-policy') }}" target="_blank" id="policyLink">@lang('registration.terms_label_part4')</a>
                    </label>
                    @error('policy')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="mt-3">
                    @lang('registration.signup')
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" hidden>&times;</span>
            <h2 style="color: #fff">Terms and Conditions</h2>
            <p style="color: #fff; margin-top:3rem;">
                One's health and well-being are directly influenced by their nutrition and vice versa. By completing
                this form you accept that all mentioned information is correct and that you are accepting a treatment
                that is prepared based on the provided data. Any health condition occurred by a lack of information that
                is triggered due to the provided diet will be on customers' responsibility.
                <br><br>
                All health and physical condition information must be provided in its fullest accuracy, any health
                condition that occurs due to lack of information that is triggered due to the diet provided will be the
                responsibility of the clients.
                <br><br>
                It is forbidden to send or publish any document related to the subscriber and to share it in any way
                <br><br>
                Upon successful registration, you may be provided with a user account for accessing and using the online
                gym services. You are responsible for maintaining the confidentiality of your account credentials and
                for all activities that occur under your account.
                <br><br>
                You agree not to share your account credentials with any third party or allow anyone else to access your
                account. You are solely responsible for any consequences arising from unauthorized access to your
                account.
                <br><br>
                It is strictly forbidden to photograph during fitness sessions or to record videos without prior
                permission, whether for the trainer or for the participants
                <br><br>
                It is forbidden to attend more than one person for one subscription, and in the event that the presence
                of more than one person is revealed, the subscription will be canceled automatically without refunding
                any money
                <br><br>
                Payment amount is not refundable
                <br><br>
                You agree not to reproduce, distribute, modify, create derivative works of, publicly display, or exploit
                any materials or content obtained through the online gym services without the express written consent of
                nourish fitness
                <br><br>
                The collection, use, storage, and disclosure of personal information provided during the registration
                process will be governed by the privacy policy of nourish fitness
                By completing the registration form, you consent to the collection, use, storage, and disclosure of your
                personal information in accordance with the privacy policy.
                <br><br>
                Nourish Fitness strives to provide accurate and reliable information through the online gym services.
                However, the services are provided on an "as is" and "as available" basis without warranties of any
                kind, whether expressed or implied.
                <br><br>
                Nourish Fitness reserves the right to modify, suspend, or terminate the registration form or any part of
                the online gym services at any time without prior notice.
                <br><br>
                Nourish Fitness may also terminate your access to the online gym services if you violate these terms and
                conditions or engage in any unauthorized or inappropriate use of the services.
                <br><br>
                By accepting, you acknowledge that you have read, understood, and agreed to these terms and conditions.
                <br><br>
                تتأثر صحة الفرد مباشرة بتغذيتهم والعكس صحيح. باستكمال هذا النموذج ، فإنك تقبل أن جميع المعلومات المذكورة
                صحيحة وأنك تقبل علاجًا يتم إعداده بناءً على البيانات المقدمة. أي حالة صحية تحدث بسبب نقص المعلومات التي
                يتم تشغيلها بسبب النظام الغذائي المقدم ستكون على عاتق العملاء.
                <br><br>
                يجب توفير كل المعلومات الصحية و المتعلقة بالحالة الجسدية بأكمل صحة لها، أي حالة صحية تحدث بسبب نقص
                المعلومات التي يتم تشغيلها بسبب النظام الغذائي المقدم ستكون على عاتق العملاء.
                <br><br>
                يمنع ارسال او نشر اي مستند يخص المشتركة و مشاركته باي طريقة من الطرق
                <br><br>
                عند التسجيل الناجح ، قد يتم تزويدك بحساب للوصول إلى الخدمات عبر الإنترنت واستخدامها. أنت مسؤول عن الحفاظ
                على سرية بيانات اعتماد حسابك وعن جميع الأنشطة التي تحدث ضمن حسابك.
                <br><br>
                أنت توافق على عدم مشاركة بيانات اعتماد حسابك مع أي طرف ثالث أو السماح لأي شخص آخر بالوصول إلى حسابك. أنت
                وحدك المسؤول عن أي عواقب تنشأ عن الوصول غير المصرح به إلى حسابك.
                <br><br>
                يمنع منعا باتا التصوير خلال الحصص الرياضية او تسجيل الفيديوهات بدون اذن مسبق ان كان للمدربة او للمشتركات
                <br><br>
                يمنع حضور أكثر من شخص للاشتراك الواحد و في حال الكشف عن حضور أكثر من شخص واحد سيتم الغاء الاشتراك
                تلقائيا بدون استرداد أية مبالغ مالية
                <br><br>
                المبلغ الدفوع لا يرد
                <br><br>
                أنت توافق على عدم إعادة إنتاج أو توزيع أو تعديل أو إنشاء أعمال مشتقة من أي مواد أو محتوى تم الحصول عليه
                من خلال خدمات الصالة الرياضية عبر الإنترنت أو عرضها علنًا أو استغلالها دون موافقة كتابية صريحة من
                Nourish Fitness
                <br><br>
                سيخضع جمع واستخدام وتخزين والكشف عن المعلومات الشخصية المقدمة أثناء عملية التسجيل لسياسة الخصوصية الخاصة
                بـ Nourish Fitness
                <br><br>
                عند اكمال نموذج التسجيل ، فإنك توافق على جمع معلوماتك الشخصية واستخدامها وتخزينها والكشف عنها وفقًا
                لسياسة الخصوصية.
                <br><br>
                تسعى Nourish Fitness جاهدة لتوفير معلومات دقيقة وموثوقة من خلال خدمات الصالة الرياضية عبر الإنترنت. ومع
                ذلك ، يتم تقديم الخدمات على أساس "كما هي" و "كما هو متاح" دون أي ضمانات من أي نوع ، سواء كانت صريحة أو
                ضمنية.
                <br><br>
                تحتفظ Nourish Fitness بالحق في تعديل أو تعليق أو إنهاء نموذج التسجيل أو أي جزء من الخدمات المقدمة عبر
                الإنترنت في أي وقت دون إشعار مسبق.
                <br><br>
                قد تنهي Nourish Fitness أيضًا وصولك إلى الخدمات عبر الإنترنت إذا انتهكت هذه الشروط والأحكام أو شاركت في
                أي استخدام غير مصرح به أو غير مناسب للخدمات.
                <br><br>
                بالموافقة ، فإنك تقر بأنك قد قرأت وفهمت ووافقت على هذه الشروط والأحكام.
            </p>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>

    function drawcode(){


        var sel = document.getElementById("country");
        var text= sel.options[sel.selectedIndex].text;
        var numb = text.match(/\d/g);
        numb = numb.join("");
        javascript:document.getElementById('count_code').innerHTML=numb;

    }

    $(document).ready(function() {
        $.getJSON('countries.json', function(data) {
            var countries = data;
            var $countrySelect = $('#country');
            for (var i = 0; i < countries.length; i++) {
                $countrySelect.append($('<option>').val(countries[i].code).text(countries[i].name));
            }

            $countrySelect.select2();
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("modal");
        var link = document.getElementById("termsLink");
        var closeBtn = document.getElementsByClassName("close")[0];

        function openModal() {
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }
        link.addEventListener("click", openModal);
        closeBtn.addEventListener("click", closeModal);
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
    });

</script>
@endsection
