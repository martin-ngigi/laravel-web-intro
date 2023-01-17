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

    @foreach($data as $item)
        <tr>
            <td>{{$item->ID}}</td>
            <td>{{$item->Name}}</td>
            <td>{{$item->Email}}</td>
            <td>{{$item->Address}}</td>
            <td>
                 <a href={{'member-delete/'.$item->ID}}>Delete</a>
                 <a href={{'member-update/'.$item->ID}}>Update</a>
            </td>
        </tr>
    @endforeach
</table>
