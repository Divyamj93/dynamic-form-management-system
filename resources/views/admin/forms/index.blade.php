<h2>All Forms</h2>

<a href="/admin/forms/create">Create New Form</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>View</th>
    </tr>

    @foreach($forms as $form)
    <tr>
        <td>{{ $form->id }}</td>
        <td>{{ $form->title }}</td>
        <td>
            <a href="/form/{{ $form->id }}" target="_blank">Open Form</a>
        </td>
    </tr>
    @endforeach

</table>

<br><br>

    <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>