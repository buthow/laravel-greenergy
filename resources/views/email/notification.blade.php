<!DOCTYPE html>
<html>
<head><title></title></head>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    p
    {
        margin:5px 0 5px 0; padding: 0;
        font-size: 14px;
    }
    small
    {
        font-size: 12px;
        color: #666;
    }
    label {font-weight: bold;}
</style>
<body>
<div>
    <p><img src="{{ asset('/assets/logo-only.png') }}" width="5%"></p>
    <br/>
    <p>You've received a feedback from your website <a href="http://www.greenergy-led.com/" target="_blank">www.greenergy-led.com</a></p>
    <br/>
    <br/>
    <p><label><b>Sender's name</b></label></p>
    <p>{{$data['name']}}</p>
    <br/>
    <p><label><b>Sender's email address</b></label></p>
    <p><a href="{{$data['email']}}">{{$data['email']}}</a></p>
    <br/>
    <p><label><b>Message</b></label></p>
    <p>{{$data['message']}}</p>
    <br/>
    <hr/>
    <small>This is an automated e-mail. Please do not reply to this email</small>
</div>
</body>
</html>