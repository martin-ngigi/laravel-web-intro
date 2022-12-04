<h1>User Login</h1>

<!-- "get-users" is the url defined in the routes
when btn is clicked, it calls the "/get-users" url which invokes method getMyData in the Users Controller...
The getMyData method in the User controller returns user input plus token
<form action="/get-users" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Enter Username"/><br>
    <input type="password" name="password" placeholder="Enter Password"/><br>
    <button type="submit">Login</button>
</form>
