@if($errors->any())
    <ul class="" role="alert">
        @foreach($errors->all() as $error)
            <li class="text-red-600 text-xs list-disc"> {{ $error }}</li>
        @endforeach
    </ul>
@endif
