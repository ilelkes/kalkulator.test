@props(['valasztottSzak'])
@php
    $message = 'hiba, nem elérhetőek a választott szak pontszámításához a követelmények';
    $szak = $valasztottSzak['egyetem'] . '-' . $valasztottSzak['kar'] . '-' . $valasztottSzak['szak'];
    $_SESSION['valasztott_szak'] = $valasztottSzak['egyetem'] . ' ' . $valasztottSzak['kar'] . ' ' . $valasztottSzak['szak'];
    
    //A kapott php adatok mellé, szak követelmény temp
    require public_path('homework_input_szak.php');
    
    $kotelezo_szaktargyak_db = 0;
    $kotelezoen_valaszthato_szaktargyak_db = 0;
    
    if (isset($kotelezo_szaktargyak[$szak]) and isset($kotelezoen_valaszthato_szaktargyak[$szak]) and isset($kotelezo_szaktargyak_szint[$szak])) {
        if (count($kotelezo_szaktargyak[$szak]) > 0) {
            $_SESSION['kotelezo_szaktargyak'] = $kotelezo_szaktargyak[$szak];
            $_SESSION['kotelezo_szaktargyak_szint'] = $kotelezo_szaktargyak_szint[$szak];
            $kotelezo_szaktargyak_db++;
        }
    
        if (count($kotelezoen_valaszthato_szaktargyak[$szak]) > 0) {
            $_SESSION['kotelezoen_valaszthato_szaktargyak'] = $kotelezoen_valaszthato_szaktargyak[$szak];
            $kotelezoen_valaszthato_szaktargyak_db++;
        }
    }
    
@endphp

@if ($kotelezo_szaktargyak_db + $kotelezoen_valaszthato_szaktargyak_db < 2)
    <x-alert :message="$message" class="danger" />
    {{ session(['error' => true]) }}
@endif
