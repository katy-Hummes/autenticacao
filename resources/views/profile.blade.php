<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    <h1>Nome</h1>
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        @method('PUT')

        @if (session('userUpdated'))
            <div>{{ session('userUpdated') }}</div>
        @endif

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">

        </div>
        <button type="submit">Salvar</button>
    </form>

    <form action="{{ $user->profile ? route('profile.update') : route('profile.create') }}" method="POST">
        @csrf
        @if ($user->profile)
            @method('PUT')
        @endif

        @if (session('profileUpdated'))
            <div>{{ session('profileUpdated') }}</div>
        @endif

        @if (session('profileCreated'))
            <div>{{ session('profileCreated') }}</div>
        @endif

        <div>
            <label for="biography">Biography</label>
            <textarea name="biography" id="biography" cols="30" rows="10">{{ $user->profile ? $user->profile->biography : '' }}</textarea>
        </div>
        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="{{ $user->profile ? $user->profile->cpf : '' }}">
        </div>
        <div>
            <label for="birth">Data de Nascimento</label>
            <input type="date" name="birth" id="birth"
                value="{{ $user->profile ? $user->profile->birth : '' }}">
        </div>
        <div>
            <label for="age">Idade</label>
            <input type="number" name="age" id="age" value="{{ $user->profile ? $user->profile->age : '' }}">
        </div>
        <button type="submit">Salvar</button>
    </form>


</body>

</html>
