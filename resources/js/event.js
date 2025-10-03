import axios from 'axios';

// Setup Axios with CSRF token for Laravel Sanctum
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
}

// Set Authorization if token exists
const token = localStorage.getItem('api_token');
if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
} else {
    console.warn('No auth token found, requests will be unauthenticated');
}

document.addEventListener('DOMContentLoaded', () => {
    /*** CREATE EVENT ***/
    const createForm = document.getElementById('event-form');
    if (createForm) {
        createForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(createForm);
            const images = createForm.querySelector('input[name="images[]"]').files;
            for (let i = 0; i < images.length; i++) {
                formData.append('images[]', images[i]);
            }

            try {
                await axios.post('/api/events', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                });
                alert('Event created successfully!');
                createForm.reset();
                window.location.href = '/admin/events';
            } catch (error) {
                handleAxiosError(error);
            }
        });
    }

    /*** EDIT EVENT ***/
    const editForm = document.getElementById('event-edit-form');
    if (editForm) {
        const eventId = editForm.dataset.id;

        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(editForm);
            formData.append('_method', 'PUT'); // Laravel PUT override

            const images = editForm.querySelector('input[name="images[]"]').files;
            for (let i = 0; i < images.length; i++) {
                formData.append('images[]', images[i]);
            }

            try {
                await axios.post(`/api/events/${eventId}`, formData, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                });
                alert('Event updated successfully!');
                window.location.href = '/admin/events';
            } catch (error) {
                handleAxiosError(error);
            }
        });
    }

document.querySelectorAll('.delete-event-btn').forEach(button => {
    button.addEventListener('click', async () => {
        const eventId = button.dataset.id;
        if (!eventId) return;

        if (!confirm('Are you sure you want to delete this event?')) return;

        try {
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Make DELETE request
            const response = await axios.delete(`/api/events/${eventId}`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Authorization': `Bearer ${localStorage.getItem('api_token') || ''}`
                }
            });

            alert(response.data.message || 'Event deleted successfully');

            // Remove row from table
            const row = button.closest('tr');
            if (row) row.remove();

        } catch (error) {
            if (error.response && error.response.status === 401) {
                alert('Unauthorized. Please login again.');
            } else if (error.response && error.response.data && error.response.data.message) {
                alert(error.response.data.message);
            } else {
                alert('Failed to delete event.');
                console.error(error);
            }
        }
    });
});



});
