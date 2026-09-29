@if (session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="error">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif