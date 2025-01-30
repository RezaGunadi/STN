<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'STN')
<img src="{{ URL::To("/assets/img/stn_long.png") }}" class="logo" alt="STN">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
