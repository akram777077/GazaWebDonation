const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
    toggleSection();

});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
    toggleSection();

});

  function toggleSection() {
    var section = document.getElementById("sign-in");
    if (section.style.display === "none") {
      section.style.display = "block";
    } else {
      section.style.display = "none";
    }
  }