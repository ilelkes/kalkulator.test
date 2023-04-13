@props(['input'])

<div class="col d-flex flex-column gap-2 data-item">
    <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
    <p class="text-body-secondary">{{ $input['description'] }}</p>

    @php
        require public_path('homework_input.php');
        print_r($exampleData["valasztott-szak"]);
        print('<hr>');
        print_r($exampleData["erettsegi-eredmenyek"]);
        print('<hr>');
        print_r($exampleData["tobbletpontok"]);
    @endphp
</div>
