@component('mail::message')
# یک پیام دریافت شده است

از طریق فرم "تماس با ما"، پیامی از طرف "{{ $sender_name }}" دریافت شده است.

برای مشاهده پیام های دریافت شده روی دکمه زیر کلیک کنید:

@component('mail::button', ['url' => env('APP_URL') . '/panel/messages'])
مشاهده پیام های دریافت شده
@endcomponent

@endcomponent
