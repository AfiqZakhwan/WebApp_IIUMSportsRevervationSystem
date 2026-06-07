@extends('layouts.admin')
@section('page-title', 'Users')

@section('content')
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">All Users</h2>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Matric No.</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bookings</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->matric_number ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->phone ?? '—' }}</td>
                    <td class="px-6 py-4">
                        @if($user->role === 'admin')
                            <span class="inline-flex rounded-full bg-purple-100 px-2 py-1 text-xs font-medium text-purple-700">Admin</span>
                        @else
                            <span class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">Student</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $user->bookings_count }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.toggle-role', $user) }}">
                                    @csrf
                                    <button type="submit" class="text-xs px-3 py-1 rounded-lg border transition
                                        {{ $user->role === 'admin' ? 'border-blue-300 text-blue-600 hover:bg-blue-50' : 'border-purple-300 text-purple-600 hover:bg-purple-50' }}">
                                        {{ $user->role === 'admin' ? 'Make Student' : 'Make Admin' }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user and all their data?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">Delete</button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400 italic">You</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="px-6 py-6 text-center text-gray-500">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
