<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>For Each Blade</h1>
        <!-- from forEacgithM in the User Controller -->
        @foreach($users as $user)
        <h4>{{$user}}</h4>
        @endforeach
    </body>
</html>
