import "./bootstrap";
import Swiper from "swiper";
import { Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("scroll", function () {
        const header = document.querySelector(".header");
        if (window.scrollY > 20) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
    new Swiper(".shop-cate-swiper", {
        modules: [Navigation],
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: ".shop-cate-slider.next",
            prevEl: ".shop-cate-slider.prev",
        },
        grabCursor: true,
    });
    // // thêm 1 class vô body của trang login
    // const loginPage = document.querySelector(".login-page");
    // const bodyContent = document.querySelector(".body-content");
    // if (loginPage && bodyContent) {
    //     bodyContent.classList.add("is-login-page");
    // }
    // password input
    const btn = document.querySelector(".toggle-visibility");
    if (!btn) return;
    const eye = btn.querySelector(".eye");

    const input = document.querySelector('input[type="password"]');
    btn.addEventListener("click", function () {
        eye.classList.toggle("hidden");
        input.type = input.type === "password" ? "text" : "password";
    });
});
import "./profile";
import "./apicountry";
