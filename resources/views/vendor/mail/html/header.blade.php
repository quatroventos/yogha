<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('img/logo-yogha.svg')}}" class="logo" alt="Yogha">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
