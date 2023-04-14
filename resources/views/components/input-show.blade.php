@props(['input'])

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
    <p class="text-body-secondary">{{-- $input['description'] --}}</p>

    @php
        //A kapott php adatokkal, tömbökkel - A második $exampleData tömböt átneveztem $exampleData1-re, más módosítás nem történt
        require public_path('homework_input.php');
        
        $actArray = $input['title'];
    @endphp

    @if (isset($actArray))
        <x-input-show-min :inputArray="$$actArray['erettsegi-eredmenyek']" />
    @endif

</div>
