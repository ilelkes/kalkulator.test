@php
    $message = 'hiba, nem érhetőek el az érettségi eredmények';
    $message_output = '';
    
    if (isset($_SESSION['alappontszam']) and isset($_SESSION['tobbletpontszam'])) {
        $_SESSION['osszpontszam'] = $_SESSION['alappontszam'] + $_SESSION['tobbletpontszam'];
    
        $message = 'Összpontszám: <strong>' . $_SESSION['osszpontszam'] . '</strong>  (max. 500)<br> Alappontszám: ' . $_SESSION['alappontszam'] . '<br> Többletpontszám: ' . $_SESSION['tobbletpontszam'];
    
        $message_output = $_SESSION['osszpontszam'] . ' (' . $_SESSION['alappontszam'] . ' alappont + ' . $_SESSION['tobbletpontszam'] . ' többletpont)';
    }
@endphp

@if (isset($_SESSION['osszpontszam']))
    <x-alert :message="$message" class="success" />
    <x-alert :message="$message_output" class="warning" />
@else
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
