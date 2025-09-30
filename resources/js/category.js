import axios from 'axios';

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');
    if (token) axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    // CREATE Category
    const form = document.getElementById('category-form');
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const res = await axios.post('/admin/categories', formData);
                alert('Category created successfully!');
                window.location.reload();
            } catch (err) {
                if (err.response?.data?.errors) {
                    alert(Object.values(err.response.data.errors).flat().join('\n'));
                } else {
                    alert('Failed to create category.');
                    console.error(err);
                }
            }
        });
    }

    // DELETE Category
    document.querySelectorAll('.delete-category-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.dataset.id;
            if (!confirm('Are you sure you want to delete this category?')) return;

            try {
                const res = await axios.delete(`/admin/categories/${id}`);
                alert(res.data.message || 'Category deleted successfully');
                window.location.reload();
            } catch (err) {
                alert('Failed to delete category.');
                console.error(err);
            }
        });
    });
});
