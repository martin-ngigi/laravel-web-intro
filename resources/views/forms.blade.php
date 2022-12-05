<h1>User Login</h1>

<!-- "get-users" is the url defined in the routes
when btn is clicked, it calls the "/get-users" url which invokes method getMyData in the Users Controller...
The getMyData method in the User controller returns user input plus token-->

<!--1.//display errors as arrary-->
<!-- {{$errors}} -->

<!--2.//display each error using for each loop -->
<!-- @if($errors -> any())
    @foreach($errors -> all() as $err)
        <li>{{$err}}</li>
    @endforeach
@endif -->


<form action="/get-users" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter Username"/><br>
    <span style="color:red">
        @error('username')
            {{$message}}
        @enderror
    </span><br>
    <input type="password" name="userpassword" placeholder="Enter Password"/><br>
    <span style="color:red">
        @error('userpassword')
            {{$message}}
        @enderror
    </span><br>
    <button type="submit">Login</button>
</form>
