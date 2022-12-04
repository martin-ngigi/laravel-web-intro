<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

        <h1>For Blade</h1>
        <!-- from in the User Controller -->
        @for($i=0; $i<10; $i++)
        <h4>{{$i}}</h4>
        @endfor
    </body>
</html>
