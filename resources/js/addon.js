import axios from 'axios';

const token = localStorage.getItem('api_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
} else {
    console.warn('No auth token found, requests will be unauthenticated');
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addon-form');
    if (!form) return;

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        try {
            const response = await axios.post('/api/addons', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            alert('Add-on created successfully!');
            form.reset();

            // Redirect to index page to see the updated table
            window.location.href = '/admin/addons';

        } catch (error) {
            if (error.response && error.response.data.errors) {
                alert(Object.values(error.response.data.errors).flat().join('\n'));
            } else if (error.response && error.response.status === 401) {
                alert('Unauthorized. Please login again.');
            } else {
                alert('Failed to create add-on.');
                console.error(error);
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');
    if (!token) {
        console.warn('No auth token found, requests will be unauthenticated');
        return;
    }

    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    // DELETE Add-On
    document.querySelectorAll('.delete-addon-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            const addonId = button.dataset.id;
            if (!addonId) return;

            if (!confirm('Are you sure you want to delete this add-on?')) return;

            try {
                const response = await axios.delete(`/api/addons/${addonId}`);
                alert(response.data.message || 'Add-on deleted successfully');

                // Remove row from table
                const row = button.closest('tr');
                if (row) row.remove();
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    alert('Unauthorized. Please login again.');
                } else {
                    alert('Failed to delete add-on.');
                    console.error(error);
                }
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');
    if (!token) return;

    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    const updateForm = document.getElementById('addon-edit-form');
    if (!updateForm) return;

    const addonId = updateForm.dataset.id;

    updateForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(updateForm);
        formData.append('_method', 'PUT'); // Tell Laravel this is a PUT request

        try {
            const response = await axios.post(`/api/addons/${addonId}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            alert('Add-on updated successfully!');
            window.location.href = '/admin/addons';
        } catch (error) {
            if (error.response && error.response.data.errors) {
                alert(Object.values(error.response.data.errors).flat().join('\n'));
            } else if (error.response && error.response.status === 401) {
                alert('Unauthorized. Please login again.');
            } else {
                alert('Failed to update add-on.');
                console.error(error);
            }
        }
    });
});

