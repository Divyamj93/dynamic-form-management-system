<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">

    <!-- Header -->
    <div class="card">
        <h2>Submissions</h2>
    </div>

    @foreach($submissions as $submission)

        <div class="card">

            <h3>Submission #{{ $submission->id }}</h3>

            <div class="submission-grid">

                @foreach($submission->data as $item)
                    <div class="submission-item">
                        <strong>{{ ucfirst($item->field_name) }}</strong>
                        <p>{{ $item->value ?? '-' }}</p>
                    </div>
                @endforeach

            </div>

        </div>

    @endforeach

    <!-- Back -->
    <div style="margin-top:20px;">
        <a href="/admin/dashboard" class="btn-secondary">
            ← Back to Dashboard
        </a>
    </div>

</div>