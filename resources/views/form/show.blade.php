<h2>{{ $form->title }}</h2>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="/form/{{ $form->id }}">
    @csrf

    @foreach($form->fields as $field)

        <label>{{ $field->label }}</label>

        {{-- TEXT / EMAIL / NUMBER --}}
        @if(in_array($field->type, ['text','email','number','date']))
            <input type="{{ $field->type }}" name="{{ $field->label }}">
        @endif

        {{-- DROPDOWN --}}
        @if($field->type == 'dropdown')
            <select name="{{ $field->label }}">
                @foreach(json_decode($field->options ?? '[]') as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        @endif

        {{-- CHECKBOX --}}
        @if($field->type == 'checkbox')
            @foreach(json_decode($field->options ?? '[]') as $option)
                <label>
                    <input type="checkbox" name="{{ $field->label }}[]" value="{{ $option }}">
                    {{ $option }}
                </label>
            @endforeach
        @endif

        <br><br>

    @endforeach

    <button type="submit">Submit</button>
</form>


    <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>