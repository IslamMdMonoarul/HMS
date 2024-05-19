function validateForm() 
{
    var testName = document.getElementById('testName').value.trim();
    var patientName = document.getElementById('patientName').value.trim();
    var testDescription = document.getElementById('testDescription').value.trim();
    var testCost = document.getElementById('testCost').value.trim();

    
    if (testName === '' || patientName === '' || testDescription === '' || testCost === '') {
        alert('All fields are required');
        return false;
    }

    
    return true;
}