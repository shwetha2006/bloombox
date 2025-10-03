@include('admin.header')

<div style="display: flex; flex: 1;">
    @include('layouts.admin_nav')
    @vite('resources/js/event.js')

    <div style="flex: 1; padding: 2rem; background-color: #000000;">
        <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600;">Event List</h1>

        <div style="margin-bottom: 2rem;">
            <a href="{{ route('admin.events.create') }}" 
               style="background: linear-gradient(135deg, #D4AF37, #B8941F); color: #000000; font-weight: 600; padding: 12px 24px; border-radius: 6px; display: inline-block; transition: all 0.3s ease;">
                Add New Event
            </a>
        </div>

        <div style="overflow-x: auto; background-color: #1a1a1a; border-radius: 8px;">
            <table style="width: 100%; border-collapse: collapse; min-width: 900px;">
                <thead>
                    <tr style="background-color: #2d2d2d; border-bottom: 2px solid #D4AF37;">
                        <th style="padding: 1rem; color: #D4AF37;">Event ID</th>
                        <th style="padding: 1rem; color: #D4AF37;">Name</th>
                        <th style="padding: 1rem; color: #D4AF37;">Type</th>
                        <th style="padding: 1rem; color: #D4AF37;">Venue</th>
                        <th style="padding: 1rem; color: #D4AF37;">Date</th>
                        <th style="padding: 1rem; color: #D4AF37;">Description</th>
                        <th style="padding: 1rem; color: #D4AF37;">Images</th>
                        <th style="padding: 1rem; color: #D4AF37; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr style="background-color: #1a1a1a;">
                            <td style="padding: 0.875rem; color: #fff;">#{{ $event->_id }}</td>
                            <td style="padding: 0.875rem; color: #fff;">{{ $event->event_name }}</td>
                            <td style="padding: 0.875rem; color: #fff;">{{ $event->event_type }}</td>
                            <td style="padding: 0.875rem; color: #fff;">{{ $event->venue }}</td>
                            <td style="padding: 0.875rem; color: #fff;">{{ $event->date }}</td>
                            <td style="padding: 0.875rem; color: #ccc; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $event->description }}
                            </td>
                            <td style="padding: 0.875rem; color: #fff;">
                                @if($event->images)
                                    <div style="display: flex; gap: 6px;">
                                        @foreach($event->images as $img)
                                            <img src="{{ asset('storage/' . $img) }}" style="height: 48px; width: 48px; border-radius: 6px; object-fit: cover; border: 1px solid #D4AF37;">
                                        @endforeach
                                    </div>
                                @else
                                    <span style="color:#777;">No images</span>
                                @endif
                            </td>
                            <td style="padding: 0.875rem; text-align: center;">
                                <a href="{{ route('admin.events.edit', $event->_id) }}" 
                                   class="px-3 py-1 bg-green-600 rounded text-white">Edit</a>
<button type="button" 
        class="delete-event-btn px-3 py-1 bg-red-600 rounded text-white" 
        data-id="{{ $event->_id }}">
    Delete
</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
