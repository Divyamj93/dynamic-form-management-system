<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">
    <div style="text-align:right; margin-bottom:15px;">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn-danger">Logout</button>
    </form>

</div>

    <h2 style="margin-bottom:20px;">Admin Dashboard</h2>

    <!-- STATS -->
    <div class="dashboard-grid">

        <div class="stat-card">
            <h3>{{ $totalForms }}</h3>
            <p>Total Forms</p>
        </div>

        <div class="stat-card">
            <h3>{{ $totalSubmissions }}</h3>
            <p>Total Submissions</p>
        </div>

        <div class="stat-card">
            <h3>{{ $totalUsers }}</h3>
            <p>Total Users</p>
        </div>

    </div>

    <!-- ACTIONS -->
    <div class="dashboard-grid" style="margin-top:30px;">

        <a href="/admin/forms" class="action-card">📄 Manage Forms</a>

        <a href="/admin/users" class="action-card">👤 Manage Users</a>

        <a href="/admin/submissions" class="action-card">📊 View Submissions</a>

        <a href="/admin/import" class="action-card">⬆ Import CSV</a>

        <a href="/admin/export" class="action-card">⬇ Export CSV</a>

    </div>

</div>