@component('mail::message')
Hello,

Your custom subscription is about to expire. Please renew your subscription to continue using our custom services.

Thank you for using our custom application.

Regards,
The Custom Application Team
@endcomponent
@component('mail::footer')
    <img src="{{ asset('assets/img/logo.png')}}" width="125" alt="">

    © {{ date('Y') }} NourishFitness. All rights reserved.
@endcomponent