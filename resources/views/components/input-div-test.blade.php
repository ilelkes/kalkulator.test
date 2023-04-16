@props(['input'])

<a href="{{ route('inputs.testshow', $input['id']) }}" class="col d-flex flex-column gap-2 data-test-list">
    <div class="data-items">
        <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
    </div>
</a>
