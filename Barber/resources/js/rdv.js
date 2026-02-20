document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#date", {
        dateFormat: "Y-m-d",
        minDate: "today",
        onChange: function(selectedDates, dateStr) {
            fetch(`/rdv/available-hours?date=${dateStr}`)
                .then(response => response.json())
                .then(hours => {
                    const heureSelect = document.getElementById('heure');
                    heureSelect.innerHTML = '<option value="">-- Sélectionner une heure --</option>';
                    hours.forEach(h => {
                        const option = document.createElement('option');
                        option.value = h;
                        option.textContent = h;
                        heureSelect.appendChild(option);
                    });
                });
        }
    });
});