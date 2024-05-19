function validateForm() {
    var patientName = document.getElementById('patientName').value.trim();
    var dateIssued = document.getElementById('dateIssued').value.trim();
    var prescriptionText = document.getElementById('prescriptionText').value.trim();

    // Check for empty fields
    if (patientName === '' || dateIssued === '' || prescriptionText === '') {
        alert('All fields are required');
        return false;
    }

    // If all validations pass, return true
    return true;
}