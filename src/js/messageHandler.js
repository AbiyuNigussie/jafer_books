// document.getElementById("closeIcon").addEventListener("click", function () {
//   var successDiv = document.getElementsByClassName("successDiv")[0];
//   var errorDiv = document.getElementsByClassName("errorDiv")[0];

//   // successDiv.classList.remove("visible");
//   // setTimeout(function () {
//   //   successDiv.style.display = "none";
//   // }, 500);

//   errorDiv.classList.remove("visible");
//   setTimeout(function () {
//     errorDiv.style.display = "none";
//   }, 500);
// });

// function showSuccessDiv() {
//   var successDiv = document.getElementsByClassName("successDiv")[0];
//   successDiv.style.display = "flex";
//   setTimeout(function () {
//     successDiv.classList.add("visible");
//   }, 10);
// }
// function showerrorDiv() {
//   var errorDiv = document.getElementsByClassName("errorDiv")[0];
//   errorDiv.style.display = "flex";
//   setTimeout(function () {
//     errorDiv.classList.add("visible");
//   }, 10);
// }

// // Call the function to show the success message
// showSuccessDiv();
// showerrorDiv();

function hideMessage(messageType) {
  var messageDiv = document.getElementsByClassName(`${messageType}Div`)[0];

  if (messageDiv) {
    messageDiv.classList.remove("visible");
    setTimeout(function () {
      messageDiv.style.display = "none";
    }, 500);
  }
}

function showMessage(messageType) {
  var messageDiv = document.getElementsByClassName(`${messageType}Div`)[0];

  if (messageDiv) {
    messageDiv.style.display = "flex";
    setTimeout(function () {
      messageDiv.classList.add("visible");
    }, 10);
  }
}

document.getElementById("closeIcon").addEventListener("click", function () {
  hideMessage("success");
  hideMessage("error");
});

showMessage("success");
showMessage("error");
