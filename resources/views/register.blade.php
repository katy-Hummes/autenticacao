<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seu Registro</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    @if (session('success'))
        <div class="text-green-500 text-lg font-bold">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="text-red-500 text-lg font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('create.user') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <button>Submit</button>
    </form>
</body>

</html>
