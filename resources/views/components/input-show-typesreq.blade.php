@props(['valasztottSzak', 'erettsegiEredmenyek', 'tobbletpontok'])
@php
    $message = 'hiba, nem elérhetőek a választott szak pontszámításához a követelmények';
    $szak = $valasztottSzak['egyetem'] . '-' . $valasztottSzak['kar'] . '-' . $valasztottSzak['szak'];
    
    //Követelmények temp
    $kotelezo_szaktargyak['ELTE-IK-Programtervező informatikus'] = ['matematika'];
    $kotelezo_szaktargyak_szint['ELTE-IK-Programtervező informatikus'] = ['közép', 'emelt'];
    $kotelezoen_valaszthato_szaktargyak['ELTE-IK-Programtervező informatikus'] = ['biológia', 'fizika', 'informatika', 'kémia'];
    
    $kotelezo_szaktargyak['PPKE-BTK-Anglisztika'] = ['angol'];
    $kotelezo_szaktargyak_szint['PPKE-BTK-Anglisztika'] = ['emelt'];
    $kotelezoen_valaszthato_szaktargyak['PPKE-BTK-Anglisztika'] = ['francia', 'német', 'olasz', 'orosz', 'spanyol', 'történelem'];
    
    $kotelezo_szaktargyak_db = 0;
    $kotelezoen_valaszthato_szaktargyak_db = 0;
    
    if (isset($kotelezo_szaktargyak[$szak]) and count($kotelezo_szaktargyak[$szak]) > 0) {
        $kotelezo_szaktargyak_db++;
    }
    if (isset($kotelezo_szaktargyak[$szak]) and count($kotelezo_szaktargyak[$szak]) > 0) {
        $kotelezoen_valaszthato_szaktargyak_db++;
    }
@endphp

@if ($kotelezo_szaktargyak_db + $kotelezoen_valaszthato_szaktargyak_db < 2)
    <x-alert :message="$message" class="danger" />
@endif
