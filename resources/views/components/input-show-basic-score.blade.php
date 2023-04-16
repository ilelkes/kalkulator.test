@php
    $message = 'hiba, nem érhetőek el az érettségi eredmények';
    
    if (isset($_SESSION['kotelezo_eredmeny']) and isset($_SESSION['kotelezoen_valaszthato_eredmeny'])) {
        if ($_SESSION['kotelezo_eredmeny'] < 0) {
            $_SESSION['kotelezo_eredmeny'] = 0;
        }
        if ($_SESSION['kotelezo_eredmeny'] > 100) {
            $_SESSION['kotelezo_eredmeny'] = 100;
        }
    
        if ($_SESSION['kotelezoen_valaszthato_eredmeny'] < 0) {
            $_SESSION['kotelezoen_valaszthato_eredmeny'] = 0;
        }
        if ($_SESSION['kotelezoen_valaszthato_eredmeny'] > 100) {
            $_SESSION['kotelezoen_valaszthato_eredmeny'] = 100;
        }
    
        $_SESSION['alappontszam'] = ($_SESSION['kotelezo_eredmeny'] + $_SESSION['kotelezoen_valaszthato_eredmeny']) * 2;
        $message = 'Választott szak: <strong>' . $_SESSION['valasztott_szak'] . '</strong><br>Megállapított alappontszám: <strong>' . $_SESSION['alappontszam'] . '</strong> (max. 400)<br>Pontszámítás részletei: (' . $_SESSION['kotelezo_eredmeny'] . '+' . $_SESSION['kotelezoen_valaszthato_eredmeny'] . ')*2';
    }
@endphp

@if (isset($_SESSION['alappontszam']))
    <x-alert :message="$message" class="success" />
@else
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
