<form method="POST" action="{{ route('forms.store') }}">
    @csrf
    <h3>Title</h3>
    <input type="text" name="title" placeholder="Form Title" required>

    <h3>Fields</h3>

<div id="fields">
    <div>
        <input type="text" name="fields[0][label]" placeholder="Label" required>
        
        <select name="fields[0][type]">
            <option value="text">Text</option>
            <option value="email">Email</option>
            <option value="number">Number</option>
            <option value="date">Date</option>
            <option value="dropdown">Dropdown</option>
            <option value="checkbox">Checkbox</option>
        </select>

        <input type="text" name="fields[0][validation]" placeholder="Validation (ex: required|email)">
        <input type="text" name="fields[0][options]" placeholder="Options (comma separated)">
    </div>
</div>
<br><br>
<button type="button" onclick="addField()">Add Field</button>
<br><br>
<button type="submit">Save Form</button>

</form>

<br><br>

<div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>

<script>
let fieldIndex = 0;

function addField() {
    let html = `
        <div class="field-row" style="margin-bottom:10px;">
            
            <input type="text" name="fields[${fieldIndex}][label]" placeholder="Label">

            <select name="fields[${fieldIndex}][type]">
                <option value="text">Text</option>
                <option value="email">Email</option>
                <option value="number">Number</option>
                <option value="date">Date</option>
                <option value="dropdown">Dropdown</option>
                <option value="checkbox">Checkbox</option>
            </select>

            <input type="text" name="fields[${fieldIndex}][validation]" placeholder="Validation">

            <input type="text" name="fields[${fieldIndex}][options]" placeholder="Options (comma separated)">

            <!-- DELETE BUTTON -->
            <button type="button" onclick="removeField(this)">Delete</button>

        </div>
    `;

    document.getElementById('fields').insertAdjacentHTML('beforeend', html);
    fieldIndex++;
}

function removeField(button) {
    button.parentElement.remove();
}
</script>