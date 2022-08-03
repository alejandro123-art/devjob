@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        
        <ul class="mt-3 list-none text-sm my-2">
            @foreach ($errors->all() as $error)
                <li class="bg-red-100 border-l-4 border-red-600 text-red-600 font-bold p-4 my-2">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
