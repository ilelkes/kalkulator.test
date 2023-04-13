@props(['input'])

<a href="{{ route('inputs.show', $input['id']) }}" class="col d-flex flex-column gap-2 data-list">
    <div class="data-items">
        <div
            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-{{ $input['success'] ? 'success' : 'primary' }} bg-gradient fs-4 rounded-3">
            <i class="bi bi-{{ $input['id'] }}-circle"></i>
        </div>
        <h4 class="fw-semibold mb-0">{{ $input['title'] }}</h4>
        <p class="text-body-secondary">{{ $input['description'] }}</p>
    </div>
</a>
