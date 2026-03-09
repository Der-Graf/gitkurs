<x-layout title="Registrierung">
<div style="width:400px;margin:0 auto;">
    <h2>Registrierung</h2>
    <form action="/register" method="POST">
    @csrf
    <div class="row">
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}">
    @error('name')<div class="error">{{ $message }}</div>  @enderror
    </div>
    <div class="row">
    <label for="email">E-Mail:</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @error('email')<div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="row">
    <label for="password">Passwort:</label>
    <input id="password" type="password" name="password">
    @error('password')<div class="error">{{ $message }}</div>@enderror
    </div>
    <div class="row">
     <button type="submit">Registrieren</button>
    </div>
    </form>
</div>
</x-layout>
