const viewhistoryForm = document.getElementById("vh_form");

function isValid(viewhistoryForm) {
  const pID = viewhistoryForm.pID.value;

  document.getElementById("vh_fnameErr").innerHTML = "";

  let isValid = true;
  if (pID == "" || pID == null) {
    document.getElementById("vh_fnameErr").innerHTML =
      "<br>yoo.. Enter patient's ID!";
    isValid = false;
  }

  if (!isValid) return false;

  return true;
}
