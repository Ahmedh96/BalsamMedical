

@component('mail::message')
  <h2>Hello Admin,</h2>
  <p>You received an email from : {{ $data['email'] }}</p>
  <p>Here are the details:</p>
  <p>Name: {{ $data['name'] }}</p>
  <p>Subject: {{ $data['subject'] }}</p>
  <p>Message: {{ $data['bodyMessage'] }}</p>

  @if ($data['type_message'] == 0)
      نوع الرسالة : غير ذلك
  @elseif ($data['type_message'] == 1)
      نوع الرسالة : اقتراح
  @elseif ($data['type_message'] == 2)
      نوع الرسالة تنبية
  @elseif ($data['type_message'] == 3)
      نوع الرسالة استفسار
  @endif

  <p>Thank You</p>
@endcomponent
