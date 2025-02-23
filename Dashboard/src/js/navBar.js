
window.onscroll = function() {
    var header = document.querySelector("header");
    var logo = document.querySelector(".nav-logo img");
    if (window.scrollY > 50) {
        header.classList.add("shrink");
        logo.style.height = "30px";
    } else {
        header.classList.remove("shrink");
        logo.style.height = "60px"; 
    }
};

function toggleMenu() {
const menu = document.getElementById('nav-links');
const menuIcon = document.querySelector('.menu-icon');

menu.classList.toggle('active');
menuIcon.classList.toggle('active');
}


document.getElementById('USER_link').addEventListener('click', function(event) {
    event.preventDefault(); 
    fetch('./php/funcs.php?action=getClients')
        .then(response => response.text())
        .then(data => {
            document.getElementById('content-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching client list:', error);
            document.getElementById('content-container').innerHTML = '<p>Failed to load client list.</p>';
        });
});


const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

