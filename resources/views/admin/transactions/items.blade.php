@if (isset($detail['product']))
<tr>
   <td class="text-center">
      <img src="/{{ $detail['product']['image_path'] }}" alt="{{ $detail['product']['name'] }}" width="40">
   </td>
   <td>{{ $detail['product']['name'] }}</td>
   <td>{{ $detail['quantity'] }}</td>
   <td>{{ $detail['unit_price'] }}</td>
   <td>{{ $detail['total'] }}</td>
   <td>{{ $detail['status'] }}</td>
</tr>
@endif
