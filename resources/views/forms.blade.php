<h1>User Login</h1>

<!-- "get-users" is the url defined in the routes -->
<form action="/get-users" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter Username"/><br>
    <input type="password" name="password" placeholder="Enter Password"/><br>
    <button type="submit">Login</button>
</form>
