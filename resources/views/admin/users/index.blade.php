<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <!-- Header -->
    <div class="card">
        <h2>Users</h2>
    </div>

    <!-- Table -->
    <div class="card">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="{{ $user->role == 'admin' ? 'badge-admin' : 'badge-user' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <!-- Back Button -->
    <div style="margin-top:20px;">
        <a href="/admin/dashboard" class="btn-secondary">
            ← Back to Dashboard
        </a>
    </div>

</div>