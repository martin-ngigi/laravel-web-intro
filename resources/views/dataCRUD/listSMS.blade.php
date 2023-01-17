<!-- dataCRUD -->
<h1>SMS List</h1>

<table border="1">
    <tr>
        {{-- sender number, message code, sender number, amount, details --}}
        <td>sender number</td>
        <td> message code</td>
        <td>amount</td>
        <td>details</td>
    </tr>

    @foreach($data as $item)
        {{-- <tr>
            <td>{{$item->sender_number}}</td>
            <td>{{$item->message_code}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->details}}</td>
        </tr> --}}

        {{var_dump($item)}}

    @endforeach
</table>
