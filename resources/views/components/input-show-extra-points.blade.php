@php
    $message = 'hiba, nem érhetőek el az érettségi eredmények';
    
    if (isset($_SESSION['nyelvtudas_pontszam']) and isset($_SESSION['emelt_szintu_erettsegi_pontszam'])) {
        $_SESSION['tobbletpontszam'] = $_SESSION['nyelvtudas_pontszam'] + $_SESSION['emelt_szintu_erettsegi_pontszam'];
    
        if ($_SESSION['tobbletpontszam'] < 0) {
            $_SESSION['tobbletpontszam'] = 0;
        }
        if ($_SESSION['tobbletpontszam'] > 100) {
            $_SESSION['tobbletpontszam'] = 100;
        }
    
        $message = 'Megállapított többletpontszám: <strong>' . $_SESSION['tobbletpontszam'] . '</strong>  (max. 100)<br> Nyelvtudás pontszám: ' . $_SESSION['nyelvtudas_pontszam'] . '<br> Emelt szintű érettségi pontszám: ' . $_SESSION['emelt_szintu_erettsegi_pontszam'];
    }
@endphp

@if (isset($_SESSION['tobbletpontszam']))
    <x-alert :message="$message" class="success" />
@else
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
