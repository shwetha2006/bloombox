import axios from 'axios';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('payment-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await axios.post('/payments', formData, {
                headers: { 
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            alert(response.data.message);
            window.location.href = `/order/${formData.get('order_id')}`;
        } catch (error) {
            console.error("Payment error:", error.response?.data || error.message);
            alert('Payment failed. Try again.');
        }
    });
});
