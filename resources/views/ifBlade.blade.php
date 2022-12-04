<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <!-- from ifM in the User Controller -->
        @if($user=='Martin')
        <p>Hi {{$user}}</p>
        @elseif($user=='Ken')
        <p>Hello {{$user}}</p>
        @else
        <p>Hello Unkwon User</p>
        @endif
    </body>
</html>
