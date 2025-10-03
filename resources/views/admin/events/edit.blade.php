<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-black text-white font-sans">

@vite('resources/js/event.js')

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-2xl overflow-y-auto p-6">
        <h2 class="text-yellow-400 text-2xl font-semibold mb-6">Edit Event</h2>

        <form id="event-edit-form" data-id="{{ $event->_id }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Event Name *</label>
                <input type="text" name="event_name" value="{{ $event->event_name }}" required
                       class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Event Type *</label>
                <input type="text" name="event_type" value="{{ $event->event_type }}" required
                       class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Venue *</label>
                <input type="text" name="venue" value="{{ $event->venue }}" required
                       class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Date *</label>
                <input type="date" name="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}" required
                       class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Description</label>
                <textarea name="description" rows="4"
                          class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $event->description }}</textarea>
            </div>

            <div class="flex flex-col">
                <label class="mb-1 text-yellow-300 font-medium">Images</label>
                <input type="file" name="images[]" multiple
                       class="bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">

                @if(!empty($event->images))
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($event->images as $img)
                            <img src="{{ asset('storage/' . $img) }}" class="h-24 w-24 object-cover rounded border border-gray-600">
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('admin.events.index') }}" class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md">Update</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
