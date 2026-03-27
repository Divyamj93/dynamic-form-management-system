<h2>Valid Rows</h2>

<table border="1">
@foreach($validRows as $row)
<tr>
    <td>{{ $row[0] ?? '' }}</td>
<td>{{ $row[1] ?? '' }}</td>
</tr>
@endforeach
</table>

<h2>Invalid Rows</h2>

<table border="1">
@foreach($invalidRows as $row)
<tr>
    <td>{{ $row[0] ?? '' }}</td>
<td>{{ $row[1] ?? '' }}</td>
</tr>
@endforeach
</table>


    <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>