
@if($errors->any())
    <ul>
        @foreach ($errors ->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif



<form method="POST">
    @csrf
    <input type="hidden" name='id' value="{{ $user->idUsuario }}">
    <input type="password" name="password" placeholder="Nueva Contraseña">
    <br><br>
    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
    <br><br>
    <input type="submit" value="Enviar">
</form>
