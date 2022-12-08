<h1>Add Members</h1>
<form action="/add-mymember" method="POST">
    @csrf
    <input type="text" name="nameInput" placeholder="Enter Name"><br>
    <input type="text" name="emailInput" placeholder="Enter Email"><br>
    <input type="text" name="addressInput" placeholder="Enter Address"><br>
    <button type="submit"> Add Member</button>
</form>
