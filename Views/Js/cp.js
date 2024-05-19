function submitData() {
  $("#success").innerHTML = "";
  $(document).ready(function () {
    $("#cp_form").submit(function (event) {
      event.preventDefault();
      const formData = {
        newPassword: $("#newPassword").val(),
        confirmPassword: $("#confirmPassword").val(),
        // superheroAlias: $("#superheroAlias").val(),
      };

      $.ajax({
        type: "POST",
        url: "../control/changePasswordAction.php",
        data: formData,
        // dataType: "json",
        // encode: true,

        success: function (response) {
          $("#success").html("Password changed successfully:(<br>");
          // alert(response);
          console.log(response);
        },
      });
    });
  });
}
