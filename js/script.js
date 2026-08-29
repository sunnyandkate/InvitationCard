
let mobileMenu = document.querySelector(".mobile-menu");
let toggleMenu = document.querySelector(".toggle-menu");

toggleMenu.addEventListener("click", function(){
   
    if (mobileMenu.style.display === "block") {
   		 mobileMenu.style.display = "none";
      } else {
        mobileMenu.style.display = "block";
      }
});
