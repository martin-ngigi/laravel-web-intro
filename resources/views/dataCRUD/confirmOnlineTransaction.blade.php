<!-- dataCRUD -->
<h1>Confirmation List</h1>

<table border="1">
    <tr>
        <td>Merchant Request ID</td>
        <td>sender Number</td>
        <td>amount</td>
        <td>details</td>
    </tr>

    @foreach($data_response as $item)
        {{-- <tr>
            <td>{{$item->MerchantRequestID}}</td>
            <td>{{$item->sender_number}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->details}}</td>
        </tr> --}}

        {{var_dump($item)}}

    @endforeach
</table>
