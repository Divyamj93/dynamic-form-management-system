<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <div class="card" style="max-width:600px; margin:auto;">

        <h2 style="text-align:center;">{{ $form->title }}</h2>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/form/{{ $form->id }}">
            @csrf

            @foreach($form->fields as $field)

                <div style="margin-bottom:15px;">

                    <label style="display:block; margin-bottom:5px;">
                        {{ ucfirst($field->label) }}
                    </label>

                    {{-- TEXT / EMAIL / NUMBER / DATE --}}
                    @if(in_array($field->type, ['text','email','number','date']))
                        <input type="{{ $field->type }}"
                               name="{{ $field->label }}"
                               value="{{ old($field->label) }}"
                               style="width:100%;">
                    @endif

                    {{-- DROPDOWN --}}
                    @if($field->type == 'dropdown')
                        <select name="{{ $field->label }}" style="width:100%;">
                            @foreach(json_decode($field->options ?? '[]') as $option)
                                <option value="{{ $option }}"
                                    {{ old($field->label) == $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    @endif

                    {{-- CHECKBOX --}}
                    @if($field->type == 'checkbox')
                        @foreach(json_decode($field->options ?? '[]') as $option)
                            <label style="margin-right:10px;">
                                <input type="checkbox"
                                       name="{{ $field->label }}[]"
                                       value="{{ $option }}"
                                       {{ in_array($option, old($field->label, [])) ? 'checked' : '' }}>
                                {{ $option }}
                            </label>
                        @endforeach
                    @endif

                </div>

            @endforeach

            <button type="submit" class="btn" style="width:100%;">
                Submit
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