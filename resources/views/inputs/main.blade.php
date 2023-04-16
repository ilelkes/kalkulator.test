<x-layout>
    <div class="row g-5 py-5">
        <div class="col-lg-6 d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Példa adatok</h3>
            <a href="{{ route('inputs.index') }}" class="btn btn-secondary">Tovább a példa adatokhoz</a>
            <p>A bemenet és a hozzájuk tartozó kimenet a kapott példákkal, a kapott fájlból.</p>
        </div>
        <div class="col-lg d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Teszt adatok</h3>
            <a href="{{ route('inputs.testarray') }}" class="btn btn-secondary">Tovább a teszt adatokhoz</a>
            <p>A kapott fix esetek mellett módosítható teszt adatok.</p>
        </div>
    </div>
</x-layout>
