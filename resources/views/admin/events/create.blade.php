<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-black text-white font-sans">

@vite('resources/js/event.js')

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto p-6">
        <h2 class="text-yellow-400 text-2xl font-semibold mb-4">Add New Event</h2>

        <form id="event-form" enctype="multipart/form-data" novalidate>
            @csrf

            <label class="text-yellow-400 font-semibold">Event Name *</label>
            <input type="text" name="event_name" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Event Type *</label>
            <input type="text" name="event_type" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Venue *</label>
            <input type="text" name="venue" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Date *</label>
            <input type="date" name="date" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Description</label>
            <textarea name="description" class="bg-gray-800 p-3 rounded-md w-full mb-3"></textarea>

            <label class="text-yellow-400 font-semibold">Images</label>
            <input type="file" name="images[]" multiple class="bg-gray-800 p-2 rounded-md w-full mb-3">

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('admin.events.index') }}" class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
