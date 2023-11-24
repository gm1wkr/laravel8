@if(session()->has('success'))
    <div 
        x-data="{show: true}"
        x-init="setTimeout( () => show = false, 4000)"
        x-show="show"
        class="fixed bottom-0 right-0 bg-blue-400 text-white py-4 px-4 mb-6 mr-6 border border-blue-700 rounded-xl"
    >
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif