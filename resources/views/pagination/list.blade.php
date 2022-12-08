<h1>Members List</h1>

<table border="2">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
    </tr>

    @foreach( $members as $member)
        <tr>
            <td>{{$member['ID']}}</td>
            <td>{{$member['Name']}}</td>
            <td>{{$member['Email']}}</td>
            <td>{{$member['Address']}}</td>
        </tr>
    @endforeach
</table>

<span>
    {{$members -> links()}}
</span>

<!-- handle the big size next pages -->
<style>
    .w-5{
        display: none;
    }
</style>


