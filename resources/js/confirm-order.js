import axios from 'axios';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('confirm-order-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await axios.post('/cart/confirm', formData, {
    headers: { 
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        'X-Requested-With': 'XMLHttpRequest'  // <-- add this
    }
});


            // Make sure order_id exists
            if (response.data && response.data.order_id) {
                window.location.href = `/order/${response.data.order_id}`;
            } else {
                alert('Order confirmed but cannot redirect.');
            }
        } catch (error) {
            console.error(error);
            if (error.response && error.response.data.error) {
                alert(error.response.data.error);
            } else {
                alert('Failed to confirm order.');
            }
        }
    });
});
 