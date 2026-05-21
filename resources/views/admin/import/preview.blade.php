<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <!-- VALID ROWS -->
    <div class="card">
        <h2 style="color:green;">✔ Valid Rows</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach($validRows as $row)
                    <tr>
                        <td>{{ $row[0] }}</td>
                        <td>{{ $row[1] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- INVALID ROWS -->
    <div class="card">
        <h2 style="color:red;">❌ Invalid Rows</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @foreach($invalidRows as $row)
                    <tr style="background:#ffe6e6;">
                        <td>{{ $row[0] }}</td>
                        <td>{{ $row[1] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Back -->
    <div style="text-align:center; margin-top:20px;">
        <a href="/admin/dashboard" class="btn-secondary">
            ← Back to Dashboard
        </a>
    </div>

</div>