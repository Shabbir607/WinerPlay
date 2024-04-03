

document.addEventListener("DOMContentLoaded", function() {
  // Get the first modal
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];

  // Get the second modal
  var motorModal = document.getElementById("mymotorModal");
  // var motorBtn = document.getElementById("motorBtn");
  var motorSpan = document.getElementsByClassName("motorclose")[0];
// Get all elements with the class "vlog_motor_feature_desc_btn"
    var motorBtns = document.querySelectorAll(".motorBtn");

// Loop through each button and attach the click event listener
    motorBtns.forEach(function(button) {
        button.addEventListener("click", function() {
                motorModal.style.display = "block";
        });
    });


  // Hide modals initially
  modal.style.display = "none";
  motorModal.style.display = "none";

  // When the user clicks the button, open the first modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x) in the first modal, close it
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks the button, open the second modal
  // motorBtn.onclick = function() {
  //   motorModal.style.display = "block";
  // }

  // When the user clicks on <span> (x) in the second modal, close it
  motorSpan.onclick = function() {
    motorModal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modals, close them
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    if (event.target == motorModal) {
      motorModal.style.display = "none";
    }
  }
});


//// Job Details


document.addEventListener("DOMContentLoaded", function() {
  // Get the modal
  var jobModal = document.getElementById("myjobModal");
  var jobBtn = document.getElementById("jobBtn");
  var jobSpan = document.getElementsByClassName("jobclose")[0];

  // Hide modal initially
  jobModal.style.display = "none";

  // When the user clicks the button, open the modal
  jobBtn.onclick = function() {
    jobModal.style.display = "block";
  }

  // When the user clicks on <span> (x) in the modal, close it
  jobSpan.onclick = function() {
    jobModal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == jobModal) {
      jobModal.style.display = "none";
    }
  }
});
