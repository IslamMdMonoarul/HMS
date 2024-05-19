function validateForm() {
       
        let patientName = document.getElementById("patientName").value.trim();
        let contactNo = document.getElementById("contactNo").value.trim();
        let date = document.getElementById("date").value.trim();
        let time = document.getElementById("time").value.trim();
        let reason = document.getElementById("reason").value.trim();
        var error = document.getElementById("error");
        var flag = true;
        
        if (patientName === "" || contactNo === "" || date === "" || time === "" || reason === "") {
            flag = false;
            error.innerHTML = "Please fill all fields";
            error.style.color = "red";
            return false;
        } 
        else {
            
            error.innerHTML = "";
        }
        return flag;
    }

