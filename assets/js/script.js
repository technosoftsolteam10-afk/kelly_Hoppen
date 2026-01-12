document.addEventListener("DOMContentLoaded", function () {
    const triggers = document.querySelectorAll(".sub-menu-show");
    const submenu = document.querySelector(".custom-sub-menu");
    const closesubmenu = document.querySelector(".close-sub-menu");
    const togglebar = document.querySelector("#custom-menu-show");

    triggers.forEach(trigger => {
        trigger.addEventListener("click", function (e) {
            e.preventDefault();


            if (trigger.classList.contains("active")) {
                trigger.classList.remove("active");
                submenu.classList.remove("active");

                // hide all children
                submenu.querySelectorAll(".section-container").forEach(item => {
                    item.style.display = "none";
                });
                return;
            }

            // remove active from all triggers first
            triggers.forEach(t => t.classList.remove("active"));

            // add active only to current trigger
            trigger.classList.add("active");

            // open submenu
            submenu.classList.add("active");

            // get cat-id from clicked li
            const catId = trigger.getAttribute("cat-id");

            if (catId) {
                // hide all children first
                submenu.querySelectorAll(".section-container").forEach(item => {
                    item.style.display = "none";
                });

                // find matching section and show
                const matchChild = submenu.querySelector(`#${catId}`);
                if (matchChild) {
                    matchChild.style.display = "block";
                }
            }
        });
    });

    // togglebar click
    if (togglebar) {
        togglebar.addEventListener("click", function (e) {
            e.preventDefault();
            submenu.classList.toggle("active");
        });
    }

    // close button click
    if (closesubmenu) {
        closesubmenu.addEventListener("click", function (e) {
            e.preventDefault();
            submenu.classList.remove("active");

            // remove active from all triggers
            triggers.forEach(t => t.classList.remove("active"));

            // hide all submenu children
            submenu.querySelectorAll(".section-container").forEach(item => {
                item.style.display = "none";
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Level 1: Main toggle
    const subCatMains = document.querySelectorAll(".custom-sub-cat-main");

    subCatMains.forEach(main => {
        main.addEventListener("click", (e) => {
            // prevent bubbling when clicking inside .custom-sub-cat-item
            if (e.target.closest(".custom-sub-cat-item")) return;

            // remove active from all other main items
            subCatMains.forEach(otherMain => {
                if (otherMain !== main) {
                    otherMain.classList.remove("active"); // parent active remove
                    const child = otherMain.querySelector(".custom-sub-cat-items");
                    if (child) child.classList.remove("active"); // child active remove
                }
            });

            // toggle current main
            main.classList.toggle("active"); // add active to parent
            const child = main.querySelector(".custom-sub-cat-items");
            if (child) child.classList.toggle("active"); // add active to child
        });
    });

    // Level 2: Inner toggle
    const subCatItems = document.querySelectorAll(".custom-sub-cat-item");

    subCatItems.forEach(item => {
        item.addEventListener("click", (e) => {
            e.stopPropagation(); // stop bubbling to main

            // remove active from siblings
            const parent = item.closest(".custom-sub-cat-items");
            if (parent) {
                parent.querySelectorAll(".custom-sub-cat-item.active").forEach(sibling => {
                    if (sibling !== item) {
                        sibling.classList.remove("active"); // parent item active
                        const subChild = sibling.querySelector(".custom-sub-cat-item-sub-items");
                        if (subChild) subChild.classList.remove("active"); // child sub-items active
                    }
                });
            }

            // toggle current item
            item.classList.toggle("active"); // parent item active
            const child = item.querySelector(".custom-sub-cat-item-sub-items");
            if (child) child.classList.toggle("active"); // child sub-items active
        });
    });
});

window.addEventListener("scroll", function () {
    const header = document.querySelector(".site-header");
    if (window.scrollY > 0) {
        header.classList.add("header-scroll");
    } else {
        header.classList.remove("header-scroll");
    }
});

const swiper = new Swiper(".mySwiper", {
    loop: true, // Enable looping
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    speed: 1000,
    pagination: false,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
    slidesPerView: 1, // Show one slide at a time
    spaceBetween: 20, // Gap between slides
    breakpoints: {
        768: {
            slidesPerView: 2.5,
        },
        1024: {
            slidesPerView: 3.5,
        },
    },
});

// Variant button click → popup open
document.querySelectorAll(".varient-btn").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
        e.preventDefault();
        let product = JSON.parse(this.dataset.product);
        // const base_url = JSON.parse(this.dataset.base-url);
        console.log(product);     
        document.getElementById("productpopup-subtitle").textContent =product.model_name;
        document.getElementById("productpopup-title").textContent=product.txt1;
        const imgEl = document.getElementById("productpopup-img");
        imgEl.src = base_url+"assets/img/products/" + product.img1;
        imgEl.alt = product.model_name;
        document.getElementById("productPopup").classList.toggle("active");
    });
});

// Popup close button click → popup close
document.getElementById("popupClose").addEventListener("click", function (e) {
    e.preventDefault();

    document.getElementById("productPopup").classList.remove("active");
});