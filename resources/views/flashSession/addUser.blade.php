<h1>Add Member</h1>
<form action="/add-member" method="POST">
    @if(session('username'))
    <h3 style="color: green">@{{session}} User added successfully</h3>
    @endif

    @csrf
    <input type="text" name="username" placeholder="Enter User Name"><br>
    <input type="password" name="password" placeholder="Enter Password"><br>
    <input type="text" name="email" placeholder="Enter Email"><br>
    <button type="submit">Add</button>
</form>

