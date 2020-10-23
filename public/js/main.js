var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function showPasswordLogin() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showPasswordRegister() {
    var x = document.getElementById("password");
    var y = document.getElementById("password-confirm");
    if (x.type === "password" && y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}

function showPasswordChange() {
  var x = document.getElementById("current-password");
  var y = document.getElementById("new-password");
  var z = document.getElementById("new-password-confirm");
  if (x.type === "password" && z.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
    z.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
    z.type = "password";
  }
}
function openMyForm() {
    document.getElementById("myForm").style.display = "block";
  }

function closeMyForm() {
    document.getElementById("myForm").style.display = "none";
  }

function openNdryshoTeDhenat() {
    document.getElementById("ndrysho-te-dhenat-form").style.display = "block";
}

function findUser() {
    window.location.replace('/search/'+ document.getElementById('table_filter_email').value);
}
