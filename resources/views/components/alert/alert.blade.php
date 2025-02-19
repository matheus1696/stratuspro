@if (\Session::has('success'))
    <div class="fixed z-50 transition duration-700 bottom-2 right-2 alert">
        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-4 py-3 text-white bg-green-800 ">
                
                <p class="flex items-center gap-2 text-sm w-80">
                    <span class="inline-flex items-center justify-center shrink-0 rounded-full border border-teal-300 bg-teal-100 size-5">
                        <i class="fas fa-exclamation text-green-950"></i>
                    </span>
                    {!! \Session::get('success') !!}
                </p>
            </div>
            <div class="w-full h-2 transition-all duration-1000 bg-green-900 borderAlert"></div>
        </div>
    </div>
@endif

@if (\Session::has('error'))
    <div class="fixed z-50 transition duration-700 bottom-2 right-2 w-96 alert">
        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-4 py-3 text-white bg-red-800 ">
                
                <p class="flex items-center gap-2 text-sm w-80">
                    <span class="inline-flex items-center justify-center shrink-0 rounded-full border border-pink-300 bg-pink-100 size-5">
                        <i class="fas fa-exclamation text-red-950"></i>
                    </span>
                    {!! \Session::get('error') !!}
                </p>
            </div>
            <div class="w-full h-2 transition-all duration-1000 bg-red-900 borderAlert"></div>
        </div>
    </div>
@endif

<script>
    setTimeout( function relogio() {
    let = document.querySelector('.borderAlert').classList.remove('w-full')
    let = document.querySelector('.borderAlert').classList.add('w-1')
    }, 3500)
    setTimeout( function relogio() {
        let = document.querySelector('.alert').classList.add('opacity-0')
    }, 4500)
    setTimeout( function relogio() {
    let = document.querySelector('.borderAlert').classList.remove('z-50')
        let = document.querySelector('.alert').classList.add('-z-50')
    }, 7500)
</script>


