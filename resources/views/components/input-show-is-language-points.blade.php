@props(['tobbletpontok'])
@php
    $aktkategoria = '';
    $akttipus = '';
    $aktnyelv = '';
    $pluszpont = 0;
@endphp

@foreach ($tobbletpontok as $index => $tipusok)
    @foreach ($tipusok as $elnevezes => $vizsgaltadat)
        @php
            if ($elnevezes == 'kategoria') {
                $aktkategoria = $vizsgaltadat;
            }
            if ($elnevezes == 'tipus') {
                $akttipus = $vizsgaltadat;
            }
            if ($elnevezes == 'nyelv') {
                $aktnyelv = $vizsgaltadat;
                if ($aktkategoria == 'Nyelvvizsga') {
                    if ($akttipus == 'B2') {
                        $pluszpont = 28;
                    }
                    if ($akttipus == 'C1') {
                        $pluszpont = 40;
                    }
            
                    if (!isset($_SESSION['nyelvtudas'][$aktnyelv])) {
                        $_SESSION['nyelvtudas'][$aktnyelv] = $pluszpont;
                    }
            
                    //Egy nyelvből csak egy - max - pontszám kerüljön felszámításra
                    if ($_SESSION['nyelvtudas'][$aktnyelv] < $pluszpont) {
                        $_SESSION['nyelvtudas'][$aktnyelv] = $pluszpont;
                    }
                }
            }
        @endphp
    @endforeach
@endforeach

@php
    if (isset($_SESSION['nyelvtudas'])) {
        foreach ($_SESSION['nyelvtudas'] as $nyelv => $pontszam) {
            $_SESSION['nyelvtudas_pontszam'] += $pontszam;
        }
    }
@endphp
