<h1>Add Members</h1>
<form action="/member-update-post" method="POST">
    @csrf
    @method('POST')
    <input type="hidden" name="id" value="{{$data['ID']}}">
    <input type="text" name="nameInput" value="{{$data['Name']}}"><br>
    <input type="text" name="emailInput" value="{{$data['Email']}}"><br>
    <input type="text" name="addressInput" value="{{$data['Address']}}"><br>
    <button type="submit"> Update Member</button>
</form>
