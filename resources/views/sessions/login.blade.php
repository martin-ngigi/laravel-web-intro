<h1>User Login</h1>


<!-- When login button is clicked, "/login-session-requests" url is called which is defined in web.php route -->
<form action="/login-session-requests" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter Username"/><br>
    <input type="password" name="userpassword" placeholder="Enter Password"/><br>
    <button type="submit">Login</button>
</form>
