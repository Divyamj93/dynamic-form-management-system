<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <div class="card" style="max-width:500px; margin:auto; text-align:center;">

        <h2>Import CSV</h2>

        <form method="POST" action="/admin/import" enctype="multipart/form-data">
            @csrf

            <div style="margin:20px 0;">
                <input type="file" name="csv" required>
            </div>

            <button type="submit" class="btn">
                Upload
            </button>

        </form>

    </div>

    <!-- Back -->
    <div style="text-align:center; margin-top:20px;">
        <a href="/admin/dashboard" class="btn-secondary">
            ← Back to Dashboard
        </a>
    </div>

</div>