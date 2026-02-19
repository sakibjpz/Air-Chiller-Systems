@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Contact Messages</h2>
    </div>

    <!-- Messages Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">ID</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Name</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Phone</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Email</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Status</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Received</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr class="border-b hover:bg-gray-50 {{ !$message->is_read ? 'bg-blue-50' : '' }}">
                    <td class="py-3 px-4">{{ $message->id }}</td>
                    <td class="py-3 px-4 font-medium">{{ $message->name }}</td>
                    <td class="py-3 px-4">{{ $message->phone }}</td>
                    <td class="py-3 px-4">{{ $message->email ?? 'N/A' }}</td>
                    <td class="py-3 px-4">
                        @if(!$message->is_read)
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">New</span>
                        @elseif($message->is_replied)
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Replied</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">Read</span>
                        @endif
                    </td>
                    <td class="py-3 px-4">{{ $message->created_at->diffForHumans() }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('admin.contact-messages.show', $message) }}" 
                           class="text-blue-600 hover:text-blue-800 mr-3">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.contact-messages.destroy', $message) }}" 
                              method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-3xl mb-2"></i>
                        <p>No contact messages yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection