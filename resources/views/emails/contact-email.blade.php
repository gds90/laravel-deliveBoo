{{-- Email layout --}}
<h1>Ciao Admin</h1>
<p>
    Hai ricevuto una nuova mail da Deliveboo.com: <br>
    Nome: {{ $lead->name }} <br>
    Cognome: {{ $lead->surname }} <br>
    Telefono: {{ $lead->phone }} <br>
    Email: {{ $lead->email }} <br>
    Messaggio: <br>
    {{ $lead->content }}
</p>
