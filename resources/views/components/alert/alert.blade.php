@if (\Session::has('success'))
    <div class="fixed z-50 transition duration-700 bottom-2 right-2 alert">
        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-4 py-3 text-white bg-green-800 w-80">
                <p class="text-sm">{!! \Session::get('success') !!}</p>
            </div>
            <div class="w-full h-2 transition-all duration-1000 bg-green-900 borderAlert"></div>
        </div>
    </div>
@endif

@if (\Session::has('error'))
    <div class="fixed z-50 transition duration-700 bottom-2 right-2 w-96 alert">
        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-4 py-3 text-white bg-red-800 ">
                <p class="text-sm w-60">{!! \Session::get('error') !!}</p>
            </div>
            <div class="w-full h-2 transition-all duration-1000 bg-red-900 borderAlert"></div>
        </div>
    </div>
@endif

<script>
    setTimeout( function relogio() {
    let = document.querySelector('.borderAlert').classList.remove('w-full')
    let = document.querySelector('.borderAlert').classList.add('w-1')
    }, 3000)
    setTimeout( function relogio() {
        let = document.querySelector('.alert').classList.add('opacity-0')
    }, 4000)
    setTimeout( function relogio() {
    let = document.querySelector('.borderAlert').classList.remove('z-50')
        let = document.querySelector('.alert').classList.add('-z-50')
    }, 7000)
</script>


