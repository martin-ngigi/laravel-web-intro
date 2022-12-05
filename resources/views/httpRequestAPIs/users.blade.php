<h1>User Login</h1>


<!-- When login button is clicked, "/http-user-requests" is called which is defined in web.php route -->
<form action="/http-user-requests" method="POST">
    <!-- {{method_field('DELETE')}} -->
    {{method_field('PUT')}}
    @csrf
    <input type="text" name="username" placeholder="Enter Username"/><br>
    <input type="password" name="userpassword" placeholder="Enter Password"/><br>
    <button type="submit">Login</button>
</form>
