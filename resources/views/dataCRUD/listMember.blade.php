<!-- dataCRUD -->
<h1>Members List</h1>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
        <td>Operation</td>
    </tr>

    @foreach($members as $member)
        <tr>
            <td>{{$member['ID']}}</td>
            <td>{{$member['Name']}}</td>
            <td>{{$member['Email']}}</td>
            <td>{{$member['Address']}}</td>
            <td> <a href={{'member-delete/'.$member['ID']}}>Delete</td>
        </tr>
    @endforeach
</table>
