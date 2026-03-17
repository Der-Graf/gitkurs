<x-layout>{{-- Übergabe eines Variablenwertes --}}

    <div class="container mt-5">
        <h1>Benutzerliste</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Portrait</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->imagepath && Storage::disk('public')->exists($user->imagepath))
                            <img src="{{ $user->imagepath }}" alt="{{ $user->name }}" style="max-width:20%; margin-bottom: 10px; display: block;">
                        @else
                        <form action="{{ route('users.upload', $user->id) }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                            @csrf
                            <input type="file" name="image" accept="image/*" required style="font-size: 0.9rem;">
                            <button type="submit" class="btn btn-sm btn-primary">Hochladen</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>