<x-layout>
    <div class="row row-cols-1 row-cols-md-2 g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h3 class="fw-bold">Példa adatok</h3>
            <a href="{{ route('inputs.main') }}" class="btn btn-secondary">Vissza a kezdőoldalra</a>
            <p class="text-body-secondary">A bemenet és a hozzájuk tartozó kimenet a kapott fájlból. A szürke példa adat
                dobozok kattinthatóak.</p>
        </div>
        <div class="col">
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                @unless (count($inputs) == 0)
                    @foreach ($inputs as $input)
                        <x-input-div :input="$input" />
                    @endforeach
                @else
                    <p>Nem található tesztadat.</p>
                @endunless
            </div>
        </div>
    </div>
</x-layout>
