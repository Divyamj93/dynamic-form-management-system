<x-app-layout>
    <x-slot name="header">
        <h2>Submissions</h2>
    </x-slot>

    <div class="p-6">

        @foreach($submissions as $submission)
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:15px;">
                
                <strong>Submission ID: {{ $submission->id }}</strong><br><br>

                @foreach($submission->data as $item)
                    <p><strong>{{ $item->field_label }}:</strong> {{ $item->value }}</p>
                @endforeach

            </div>
        @endforeach

    </div>
    
    <div style="margin-bottom:15px;">
    <a href="/admin/dashboard" style="background:#333;color:#fff;padding:6px 10px;text-decoration:none;">
        ← Back to Dashboard
    </a>
</div>
</x-app-layout>
