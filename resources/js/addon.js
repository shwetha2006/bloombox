import axios from 'axios';

const token = localStorage.getItem('api_token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
} else {
    console.warn('No auth token found, requests will be unauthenticated');
}

// --- GET / Fetch all Add-Ons and populate table ---
async function fetchAddOns() {
    try {
        const response = await axios.get('/api/addons');
        const addons = response.data.data || response.data; // for API resource collection
        const tbody = document.querySelector('table tbody');
        if (!tbody) return;

        tbody.innerHTML = ''; // Clear existing rows

        addons.forEach(addon => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>#${addon.id}</td>
                <td>${addon.name}</td>
                <td style="text-align:center;">
                    ${addon.image ? `<img src="/storage/${addon.image}" alt="${addon.name}" style="height:64px;width:64px;object-fit:cover;border-radius:8px;border:2px solid #D4AF37;">` : 'No Image'}
                </td>
                <td>${addon.description || ''}</td>
                <td>${addon.stock_quantity}</td>
                <td>Rs. ${parseFloat(addon.price).toFixed(2)}</td>
                <td style="text-align:center;">
                    <a href="/admin/addons/${addon.id}/edit" style="margin-right:5px;">✏️ Edit</a>
                    <button class="delete-addon-btn" data-id="${addon.id}">🗑️ Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });

        // Re-attach delete event listeners
        attachDeleteListeners();
    } catch (error) {
        console.error('Failed to fetch add-ons:', error);
    }
}

// --- DELETE Add-On ---
function attachDeleteListeners() {
    document.querySelectorAll('.delete-addon-btn').forEach(button => {
        button.addEventListener('click', async () => {
            const addonId = button.dataset.id;
            if (!addonId) return;

            if (!confirm('Are you sure you want to delete this add-on?')) return;

            try {
                const response = await axios.delete(`/api/addons/${addonId}`);
                alert(response.data.message || 'Add-on deleted successfully');
                fetchAddOns(); // Refresh table
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
}

// --- POST / Create Add-On ---
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addon-form');
    if (!form) return;

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        try {
            const response = await axios.post('/api/addons', formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
            });
            alert('Add-on created successfully!');
            form.reset();
            fetchAddOns(); // Refresh table
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

// --- PUT / Update Add-On ---
document.addEventListener('DOMContentLoaded', () => {
    const updateForm = document.getElementById('addon-edit-form');
    if (!updateForm) return;

    const addonId = updateForm.dataset.id;

    updateForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(updateForm);
        formData.append('_method', 'PUT'); // Laravel expects PUT

        try {
            const response = await axios.post(`/api/addons/${addonId}`, formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
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

// Fetch add-ons on page load
document.addEventListener('DOMContentLoaded', fetchAddOns);
