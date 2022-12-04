<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Url generation</h1><br>

        <p>Current Page Url:</p>
        {{URL::current()}}


        <p>About Page Url</p>
        <a href="/about">About</a>


        <p>Previous Page Url</p>
        {{URL::previous()}}

        <form action="{{URL::to('/about')}}" method="">
            <input type="text"/>
            <button>Submit</button>
        </form>
    </body>
</html>
