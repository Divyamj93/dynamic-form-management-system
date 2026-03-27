<h2>Import CSV</h2>

<form method="POST" action="/admin/import" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv" required>
    <button type="submit">Upload</button>
</form>


    <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>