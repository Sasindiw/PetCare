document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const petType = document.getElementById('petType').value;
    const appointmentDate = document.getElementById('appointmentDate').value;
   
    alert(`Appointment booked for ${petType} on ${appointmentDate}`);
  });
  