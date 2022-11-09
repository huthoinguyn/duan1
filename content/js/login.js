const userContainer = document.querySelector(".user-container"),
  userCloseIcon = document.querySelector(".user-close-icon"),
  userIcon = document.querySelector(".user-icon");
body = document.querySelector("body");

let getStatus = localStorage.getItem("showForm");
if (getStatus && getStatus === "active") {
  userContainer.classList.add("active");
}

userIcon.addEventListener("click", () => {
  userContainer.classList.toggle("active");
  if (userContainer.classList.contains("active")) {
    localStorage.setItem("showForm", "active");
  }
});

userCloseIcon.addEventListener("click", () => {
  userContainer.classList.toggle("active");
  if (!userContainer.classList.contains("active")) {
    localStorage.setItem("showForm", "");
  }
});
