<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <!-- Header -->
    <div class="card">
        <h2>All Forms</h2>

        <a href="/admin/forms/create" class="btn">+ Create New Form</a>
    </div>

    <!-- Table -->
    <div class="card">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->title }}</td>
                    <td>
                        <a href="/form/{{ $form->id }}" target="_blank" class="btn-secondary">
                            Open Form
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Back Button -->
    <div style="margin-top:20px;">
        <a href="/admin/dashboard" class="btn-secondary">
            ← Back to Dashboard
        </a>
    </div>

</div>