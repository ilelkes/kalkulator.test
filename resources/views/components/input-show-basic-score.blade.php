@php
    $message = 'hiba, nem érhetőek el az érettségi eredmények';
    
    if (isset($_SESSION['kotelezo_eredmeny']) and isset($_SESSION['kotelezoen_valaszthato_eredmeny'])) {
        $_SESSION['alappontszam'] = ($_SESSION['kotelezo_eredmeny'] + $_SESSION['kotelezoen_valaszthato_eredmeny']) * 2;
        $message =
            '
            Választott szak: <strong>' .
            $_SESSION['valasztott_szak'] .
            '</strong><br>
            Megállapított alappontszám: <strong>' .
            $_SESSION['alappontszam'] .
            '</strong><br>
            Pontszámítás részletei: (' .
            $_SESSION['kotelezo_eredmeny'] .
            '+' .
            $_SESSION['kotelezoen_valaszthato_eredmeny'] .
            ')*2';
    }
@endphp

@if (isset($_SESSION['alappontszam']))
    <x-alert :message="$message" class="success" />
@else
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
