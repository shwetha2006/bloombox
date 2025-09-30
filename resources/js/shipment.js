import axios from 'axios';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('shipment-form');
    const summary = document.getElementById('shipment-summary');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await axios.post('/shipments', formData, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (response.data.success) {
                // Show shipment summary with total + 800 shipment
                summary.classList.remove('hidden');
            } else {
                alert('Failed to save shipment.');
            }
        } catch (error) {
            console.error(error);
            alert('Error saving shipment.');
        }
    });
});
