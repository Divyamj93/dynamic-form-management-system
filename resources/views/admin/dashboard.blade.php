<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 mb-4 shadow rounded">
                <p>Total Forms: {{ $totalForms }}</p>
                <p>Total Submissions: {{ $totalSubmissions }}</p>
                <p>Total Users: {{ $totalUsers }}</p>
            </div>

            <div class="bg-white p-6 shadow rounded">
                <a href="/admin/forms">Manage Forms</a><br><br>
                <a href="/admin/users">Manage Users</a><br><br>   
                <a href="/admin/submissions">View Submissions</a><br><br> 
                <a href="/admin/import">Import CSV</a><br><br>
                <a href="/admin/export">Export CSV</a>
            </div>

        </div>
    </div>
</x-app-layout>