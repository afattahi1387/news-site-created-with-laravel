@component('mail::message')
# پاسخ پیام شما

شما از طریق صفحه تماس با ما، پیامی داده بودید. این ایمیل پاسخ پیام شما است.

## پیام شما

{!! $message->message !!}

## پاسخ پیام شما

{!! $answer !!}

@endcomponent
