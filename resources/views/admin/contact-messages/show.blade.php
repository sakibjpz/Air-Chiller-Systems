@extends('layouts.admin')

@section('title', 'Contact Message Details')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Contact Message Details</h2>
        <p class="text-gray-600 mt-1">View message from {{ $contactMessage->name }}</p>
    </div>

    <!-- Message Details -->
    <div class="space-y-6">
        <!-- Status Badges -->
        <div class="flex space-x-3">
            @if(!$contactMessage->is_read)
                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">New Message</span>
            @endif
            @if($contactMessage->is_replied)
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Replied</span>
            @endif
        </div>

        <!-- Sender Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 rounded-lg p-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                <p class="text-lg font-semibold text-gray-900">{{ $contactMessage->name }}</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
                <p class="text-lg font-semibold text-gray-900">
                    <a href="tel:{{ $contactMessage->phone }}" class="text-blue-600 hover:text-blue-800">
                        {{ $contactMessage->phone }}
                    </a>
                </p>
            </div>

            @if($contactMessage->email)
            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Email Address</label>
                <p class="text-lg font-semibold text-gray-900">
                    <a href="mailto:{{ $contactMessage->email }}" class="text-blue-600 hover:text-blue-800">
                        {{ $contactMessage->email }}
                    </a>
                </p>
            </div>
            @endif

            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Message</label>
                <p class="text-gray-900 whitespace-pre-line">{{ $contactMessage->message ?: 'No message provided.' }}</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Received</label>
                <p class="text-gray-900">{{ $contactMessage->created_at->format('F j, Y \a\t g:i A') }}</p>
                <p class="text-sm text-gray-500">{{ $contactMessage->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Action Buttons -->
       <!-- Action Buttons -->
<div class="pt-6 border-t border-gray-200 flex justify-between items-center">
    <div>
        @if(!$contactMessage->is_replied)
        <form action="{{ route('admin.contact-messages.replied', $contactMessage) }}" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                <i class="fas fa-check mr-2"></i>Mark as Replied
            </button>
        </form>
        @endif
    </div>
    <div class="space-x-3">
        <a href="mailto:{{ $contactMessage->email }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            <i class="fas fa-reply mr-2"></i>Reply via Email
        </a>
        <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
            <i class="fas fa-arrow-left mr-2"></i>Back
        </a>
    </div>
</div>
    </div>
</div>
@endsection