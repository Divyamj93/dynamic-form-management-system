<html>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container">
    <div class="card">

        <h2>Create Form</h2>

        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('forms.store') }}">
            @csrf

            <h3>Title</h3>
            <input type="text" name="title" placeholder="Form Title" required>

            <h3>Fields</h3>

            <div id="fields">
            <div class="field-row">
                <input type="text" name="fields[0][label]" placeholder="Label" required>
                
                <select name="fields[0][type]">
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                    <option value="dropdown">Dropdown</option>
                    <option value="checkbox">Checkbox</option>
                </select>
                <label class="required-label">
                    <input type="checkbox" name="fields[0][required]" value="1">
                    Required
                </label>

                <!-- ✅ VALIDATION SELECT -->
                <select name="fields[0][validation]">
                    <option value="">No Validation</option>
                    <option value="email">Email</option>
                    <option value="numeric">Numeric</option>
                </select>
                <!-- <input type="text" name="fields[0][validation]" placeholder="Validation (ex: required|email)"> -->
                <input type="text" name="fields[0][options]" placeholder="Options (comma separated)">
            </div>
            </div>

            <button type="button" onclick="addField()">+ Add Field</button>

            <br><br>

            <button type="submit">Save Form</button>
        </form>
        <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>
    </div>
</div>

<br><br>



<script>
let fieldIndex = 1;
// let fieldIndex = document.querySelectorAll('#fields div').length;

function addField() {
    let html = `
<div class="field-row">

    <input type="text" name="fields[${fieldIndex}][label]" placeholder="Label" required>

    <select name="fields[${fieldIndex}][type]">
        <option value="text">Text</option>
        <option value="email">Email</option>
        <option value="number">Number</option>
        <option value="date">Date</option>
        <option value="dropdown">Dropdown</option>
        <option value="checkbox">Checkbox</option>
    </select>

    <label class="required-label">
        <input type="checkbox" name="fields[${fieldIndex}][required]" value="1">
        Required
    </label>

    <select name="fields[${fieldIndex}][validation]">
        <option value="">No Validation</option>
        <option value="email">Email</option>
        <option value="numeric">Numeric</option>
    </select>

    <input type="text" name="fields[${fieldIndex}][options]" placeholder="Options">

    <button type="button" class="btn-danger" onclick="removeField(this)">Delete</button>
</div>
`;

    document.getElementById('fields').insertAdjacentHTML('beforeend', html);
    fieldIndex++;
}

function removeField(button) {
    button.parentElement.remove();
}
</script>
</html>