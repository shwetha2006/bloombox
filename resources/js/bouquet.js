import axios from 'axios';

const token = localStorage.getItem('api_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
} else {
    console.warn('No auth token found, requests will be unauthenticated');
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('bouquet-form');
    if (!form) return;

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        try {
            await axios.post('/api/bouquets', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            alert('Bouquet created successfully!');
            form.reset();
            window.location.href = '/admin/bouquets';
        } catch (error) {
            if (error.response && error.response.data.errors) {
                alert(Object.values(error.response.data.errors).flat().join('\n'));
            } else if (error.response && error.response.status === 401) {
                alert('Unauthorized. Please login again.');
            } else {
                alert('Failed to create bouquet.');
                console.error(error.response || error);
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

    // DELETE Bouquet
    document.querySelectorAll('.delete-bouquet-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            const bouquetId = button.dataset.id;
            if (!bouquetId) return;

            if (!confirm('Are you sure you want to delete this bouquet?')) return;

            try {
                const response = await axios.delete(`/api/bouquets/${bouquetId}`);
                alert(response.data.message || 'Bouquet deleted successfully');

                // Remove row from table
                const row = button.closest('tr');
                if (row) row.remove();
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    alert('Unauthorized. Please login again.');
                } else if (error.response && error.response.data && error.response.data.message) {
                    alert(error.response.data.message);
                } else {
                    alert('Failed to delete bouquet.');
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

    const updateForm = document.getElementById('bouquet-edit-form');
    if (!updateForm) return;

    const bouquetId = updateForm.dataset.id;

    // Current Addons List
    const currentAddonsList = document.getElementById('current-addons');
    const addSelect = document.getElementById('addons');
    const addButton = document.getElementById('add-addon');

    // Remove addon
    currentAddonsList.addEventListener('click', e => {
        if (e.target.classList.contains('remove-addon')) {
            e.target.closest('li').remove();
        }
    });

    // Add new addon
    addButton.addEventListener('click', () => {
        const selected = addSelect.value;
        const selectedText = addSelect.options[addSelect.selectedIndex].text;

        if (!selected) return;

        // Prevent duplicates
        if ([...currentAddonsList.querySelectorAll('li input[name="addons[]"]')]
            .some(input => input.value == selected)) return;

        const li = document.createElement('li');
        li.className = 'flex justify-between items-center bg-gray-800 p-2 rounded';
        li.innerHTML = `<span>${selectedText}</span>
                        <button type="button" class="remove-addon bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                        <input type="hidden" name="addons[]" value="${selected}">`;

        currentAddonsList.appendChild(li);
    });

    // Form submission
    updateForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(updateForm);
        formData.append('_method', 'PUT'); // Tell Laravel this is a PUT request

        // Include all addons in the current list
        const hiddenInputs = currentAddonsList.querySelectorAll('input[name="addons[]"]');
        hiddenInputs.forEach(input => {
            formData.append('addons[]', input.value);
        });

        try {
            const response = await axios.post(`/api/bouquets/${bouquetId}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });

            alert('Bouquet updated successfully!');
            window.location.href = '/admin/bouquets';
        } catch (error) {
            if (error.response && error.response.data.errors) {
                alert(Object.values(error.response.data.errors).flat().join('\n'));
            } else if (error.response && error.response.status === 401) {
                alert('Unauthorized. Please login again.');
            } else {
                alert('Failed to update bouquet.');
                console.error(error);
            }
        }
    });
});
