@component('mail::message')

<h1>{{$assunto}}</h1>
<p><strong>Nome:</strong> {{$nome}}  {{$sobrenome}}</p>
<p><strong>E-mail:</strong> {{$email}}</p>
<p><strong>Empresa:</strong> {{$empresa}}</p>
<p><strong>Alojamentos:</strong> {{$alojamentos}}</p>
<p><strong>Localização:</strong> {{$localizacao}}</p>
{{--<p><strong>Tipo:</strong> {{$tipo}}</p>--}}
<p><strong>Obs:</strong><br> {{$obs}}</p>
<hr>
<small>E-mail gerado automaticamente através do sistema.</small><br>
<small>IP do rementente: {{$ip}}</small>
@endcomponent
