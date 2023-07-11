@props(['status'])

@if( session()->has($status) )
    <section
        x-data="{ showFlash: true }"
        x-show="showFlash"
        x-init="setTimeout(() => showFlash = false, 2000)"
        class="md:flex md:justify-end mt-5 absolute right-6 animate-pulse">
        <div role="alert">
            <div class="bg-green-500 text-white font-bold rounded px-4 py-2">
                <p>{{ session($status) }}</p>
            </div>
        </div>
    </section>
@endif



