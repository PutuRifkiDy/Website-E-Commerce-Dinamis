// menu navbar 
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');


menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 150){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }
}
// Drop down
function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

// efek loading
  document.addEventListener('DOMContentLoaded', function () {
    var loadingOverlay = document.getElementById('loadingOverlay');
    var searchForm = document.querySelector('.search-box-container');

    searchForm.addEventListener('submit', function (event) {
      loadingOverlay.style.display = 'block';

      // Menunda submit formulir agar dapat menampilkan overlay loading
      event.preventDefault();

      // Simulasi loading selama 5 detik (ubah nilai 5000 sesuai kebutuhan)
      setTimeout(function () {
        // Setelah selesai loading, lanjutkan dengan submit formulir
        searchForm.submit();
      }, 1000);
    });
  });


//   menu perhitungan jam menit dan detik
// Function to update countdown
function updateCountdown() {
    var now = new Date();
    var openingTime = new Date(now);
    openingTime.setHours(6, 0, 0, 0); // Set opening time to 06:00:00

    var closingTime = new Date(now);
    closingTime.setHours(23, 59, 59, 999); // Set closing time to 23:59:59

    var countdownElement = document.querySelector('.count-down');
    var statusElement = document.getElementById('status');

    if (now >= openingTime && now <= closingTime) {
        statusElement.innerHTML = 'Jam tutup hari ini ⏱️';
        var timeDifference = closingTime - now;
    } else {
        statusElement.innerHTML = 'Jam buka hari ini ⏱️';
        var timeDifference = openingTime - now;
    }

    var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    document.getElementById('day').innerHTML = formatTime(days);
    document.getElementById('hour').innerHTML = formatTime(hours);
    document.getElementById('minute').innerHTML = formatTime(minutes);
    document.getElementById('second').innerHTML = formatTime(seconds);
}

// Function to add leading zero to single-digit numbers
function formatTime(time) {
    return time < 10 ? '0' + time : time;
}

// Update countdown every second
setInterval(updateCountdown, 1000);

// Initial call to update countdown on page load
updateCountdown();
// end time

// Star button see more
let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 8;

loadMoreBtn.onclick = () =>{
let boxes = [...document.querySelectorAll('.product .box-container .box')];
for(var i = currentItem; i < currentItem + 4;i++ ){
    boxes[i].style.display = 'inline-block';
}
    currentItem += 4;

    if(currentItem >= boxes.length){
        loadMoreBtn.style.display = 'inline-block';
    }
}

// email verif
function subscribe() {
    var emailInput = document.getElementById('email');
    var userEmail = emailInput.value;

    // Validasi email
    if (!isValidEmail(userEmail)) {
        document.getElementById('invalid-email').style.display = 'block';
        return;
    }

    // Sembunyikan form dan tampilkan pesan terima kasih
    document.getElementById('subscribeForm').style.display = 'none';
    document.getElementById('thankYouMessage').style.display = 'block';
    document.getElementById('userEmail').innerText = userEmail;
}

function isValidEmail(email) {
    // Validasi email menggunakan ekspresi reguler sederhana
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// // button untuk menggantikan isi sebelumnya
// document.getElementById('toggleButton').addEventListener('click', function() {
//     var tableContainer = document.getElementById('tableContainer');
//     var formContainer = document.getElementById('formContainer');
    
//     if (tableContainer.style.display === 'none') {
//       tableContainer.style.display = 'block';
//       formContainer.style.display = 'none';
//     } else {
//       tableContainer.style.display = 'none';
//       formContainer.style.display = 'block';
//     }
//   });
  