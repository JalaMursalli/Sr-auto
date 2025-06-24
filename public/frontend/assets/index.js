document.addEventListener("DOMContentLoaded", function () {
  const themeBtns = document.querySelectorAll(".themeModeBtn");
  const body = document.body;

  // Sayfa yüklendiğinde localStorage'dan kontrol et
  const darkMode = localStorage.getItem("darkMode");

  if (darkMode === "true") {
      body.classList.add("darkMode");
  }

  // Butona tıklanınca darkMode toggle edilsin
  themeBtns.forEach(themeBtn=>{
    themeBtn?.addEventListener("click", function () {
      body.classList.toggle("darkMode");

        // Yeni durumu localStorage'a kaydet
        const isDark = body.classList.contains("darkMode");
        localStorage.setItem("darkMode", isDark);
    });
  })

});

const current_langs = document.querySelectorAll(".current-lang");

current_langs.forEach(current_lang => {
  current_lang?.addEventListener("click", (e) => {
    e.stopPropagation();
    const parent = current_lang.parentElement;

    // Önce tüm diğerlerini kapat
    current_langs.forEach(lang => {
      if (lang !== current_lang) {
        lang.parentElement.classList.remove("active");
      }
    });

    // Sonra sadece bu parent'a toggle yap
    parent.classList.toggle("active");
  });
});

document.addEventListener("click", () => {
  current_langs.forEach(current_lang => {
    current_lang.parentElement.classList.remove("active");
  });
});


const testDriveBtn=document.querySelector(".test_drive")
const test_drive_modal=document.querySelector(".test_drive_modal")
const close_testDrive=document.querySelector(".close_testDrive")

testDriveBtn?.addEventListener("click",()=>{
  test_drive_modal.classList.add("active")
  document.body.style.overflow="hidden"
})
close_testDrive?.addEventListener("click",()=>{
  test_drive_modal.classList.remove("active")
  document.body.style.overflow="auto"
})

document.addEventListener("DOMContentLoaded", () => {
  const countdownElements = document.querySelectorAll(".countdown");

  countdownElements.forEach(countdownElement => {
    const countdownDateAttr = countdownElement.getAttribute("data-countdown-date");
    const countdownDate = new Date(countdownDateAttr).getTime();

    const updateCountdown = setInterval(() => {
      const now = new Date().getTime();
      const distance = countdownDate - now;

      if (distance >= 0) {
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        countdownElement.querySelector(".days").textContent = days;
        countdownElement.querySelector(".hours").textContent = hours;
        countdownElement.querySelector(".minutes").textContent = minutes;
      } else {
        // Tarih geçtiyse, tüm sayacı 00 yap
        countdownElement.querySelector(".days").textContent = "00";
        countdownElement.querySelector(".hours").textContent = "00";
        countdownElement.querySelector(".minutes").textContent = "00";

        clearInterval(updateCountdown);
      }
    }, 1000);
  });
});
const filterChecks=document.querySelectorAll('.filter input[type="radio"]')
filterChecks.forEach(check => {
  check?.addEventListener('change', () => {
    filterChecks.forEach(c => {
        if (c !== check) {
          c.checked = false;
          c.parentElement.classList.remove('checked');
        }
      });
    check.parentElement.classList.toggle("checked")
  });
});


const filterChecks2=document.querySelectorAll('.filter input[type="checkbox"]')
filterChecks2.forEach(check => {
  check?.addEventListener('change', () => {
    check.parentElement.classList.toggle("checked")
  });
});



var offer_week = new Swiper(".offer_week_slide", {
  loop:true,
  speed:1500,
  slidesPerView:"auto",
  spaceBetween:20,
  autoplay:{
    delay:3000
  },
  pagination: {
    el: ".swiper-pagination",
    clickable:true
  },
});

var ban_types = new Swiper(".ban_types_slide", {
  loop:true,
  speed:1500,
  slidesPerView:"auto",
  spaceBetween:50,
  autoplay:{
    delay:3000
  },
});
var model_characteristics_slide = new Swiper(".model-characteristics-slide", {
  loop:true,
  speed:1500,
  slidesPerView:"auto",
  spaceBetween:20,
  // autoplay:{
  //   delay:3000
  // },
});

var other_products_slide = new Swiper(".other-products-slide", {
  loop: true,
  speed: 1500,
  autoplay:{
    delay:3000
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1.5,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    350: {
      slidesPerView: 2,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    450: {
      slidesPerView: 2.2,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    500: {
      slidesPerView: 2.4,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    550: {
      slidesPerView: 2.6,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    600: {
      slidesPerView: 2.8,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    650: {
      slidesPerView: 3,
      grid: {
        rows: 2,
      },
      spaceBetween: 16,
    },
    768: {
      slidesPerView: "auto",
      grid: {
        rows: 1,
      },
      spaceBetween: 20,
    }
  }
});


var product_gallery_slide= new Swiper(".product-gallery-slide", {
  loop:true,
  speed:1500,
  slidesPerView:"auto",
  spaceBetween:20,
  // autoplay:{
  //   delay:3000
  // },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const filter_title_btns=document.querySelectorAll(".filter-selects .filter-item .filter-title")
filter_title_btns?.forEach(filter_title_btn=>{
  filter_title_btn?.addEventListener("click",()=>{
    const parentElement=filter_title_btn.parentElement
    if (parentElement.classList.contains("active")) {
      parentElement.classList.remove("active");
    } else {
      filter_title_btns.forEach((btn2) =>
        btn2.parentElement.classList.remove("active")
      );
      parentElement.classList.add("active");
    }
  })
})
document.addEventListener("click", (e) => {
  filter_title_btns.forEach((btn) => {
    const parent = btn.parentElement;
    if (!parent.contains(e.target)) {
      parent.classList.remove("active");
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const shareBtn = document.querySelector('.model-detail-head .shareBtn');
  const sharedBox = document.querySelector('.model-detail-head .shared_box');
  const closeBtn = document.querySelector('.model-detail-head .shared_box .close_shared_box');
  const copyBtn = document.querySelector('.model-detail-head .shared_box .copy_btn');
  const copyIcon = copyBtn?.querySelector('i');

  // Shared box'ı aç
  shareBtn?.addEventListener('click', (e) => {
    e.stopPropagation();
    sharedBox.style.display = 'flex';
  });

  // Shared box'ı kapat
  closeBtn?.addEventListener('click', () => {
    sharedBox.style.display = 'none';
  });

  if(sharedBox && shareBtn){
    document.addEventListener('click', (e) => {
      if (!sharedBox.contains(e.target) && !shareBtn.contains(e.target)) {
        sharedBox.style.display = 'none';
      }
    });
  }else{
    return
  }



  // URL kopyala ve ikon değiştir
  copyBtn?.addEventListener('click', () => {
    navigator.clipboard.writeText(window.location.href);
    copyIcon.classList.remove('bi-share');
    copyIcon.classList.add('bi-check2');

    setTimeout(() => {
      copyIcon.classList.remove('bi-check2');
      copyIcon.classList.add('bi-share');
    }, 1000);
  });
});


const filter_area=document.querySelector(".filter-area")
const closeFilter=document.querySelector(".closeFilter")
const showFilter=document.querySelector(".showFilter")
showFilter?.addEventListener("click",()=>{
  window.scrollTo({
    top: 0
});
  filter_area.style.left="0"
  document.body.style.overflow="hidden"
})

closeFilter?.addEventListener("click",()=>{
  filter_area.style.left="-100%"
  document.body.style.overflow="auto"

})


const hamburger=document.querySelector(".hamburger")
const mobile_menu_container=document.querySelector(".mobile_menu_container")
const close_mobile_menu=document.querySelector(".close_mobile_menu")
hamburger?.addEventListener("click",()=>{
  mobile_menu_container.classList.add("active")
  document.body.style.overflow="hidden"
})

close_mobile_menu?.addEventListener("click",()=>{
  mobile_menu_container.classList.remove("active")
  document.body.style.overflow="auto"
})
