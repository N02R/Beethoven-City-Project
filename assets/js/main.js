/**
 * main.js - Beethoven City Services
 * النسخة المحدثة لضمان ربط النقاط (Dots) وتفعيل الكاروسيل تلقائياً
 */

document.addEventListener("DOMContentLoaded", () => {
    
    // 1. تفعيل نظام النقاط العالمي (Global Dots System)
    initGlobalCarouselDots();

    // 2. تأثير الهيدر عند التمرير (Header Scroll Effect)
    const header = document.querySelector("header");
    if (header) {
        window.addEventListener("scroll", () => {
            window.scrollY > 50 ? header.classList.add("scrolled") : header.classList.remove("scrolled");
        });
    }

    // 3. تأثير البطاقات عند التحويم (Choose Section Hover)
    const cards = document.querySelectorAll("section.choose .choose-card");
    if (cards.length) {
        const activeCard = document.querySelector("section.choose .choose-card.active");
        cards.forEach((card) => {
            card.addEventListener("mouseenter", () => {
                if (activeCard) activeCard.classList.remove("active");
            });
            card.addEventListener("mouseleave", () => {
                if (activeCard) activeCard.classList.add("active");
            });
        });
    }

    // 4. نظام تبديل اللغات (Language Switcher)
    // initLanguageSwitcher();

    // 5. عداد الأرقام (Counter Animation)
    initCounters();
});

/* =========================================
   دالة ربط النقاط (Dots) بالكاروسيل
========================================= */
function initGlobalCarouselDots() {
    /**
     * الاستماع لحدث 'slid.bs.carousel' الذي يطلقه Bootstrap 
     * بعد اكتمال حركة السلايد تماماً.
     */
    document.addEventListener('slid.bs.carousel', function (event) {
        const carouselId = event.target.id;
        if (!carouselId) return;

        // البحث عن جميع النقاط المرتبطة بهذا الكاروسيل بالـ ID
        const dots = document.querySelectorAll(`.dot[data-bs-target="#${carouselId}"]`);
        
        if (dots.length > 0) {
            // 1. تنظيف جميع النقاط من كلاس active
            dots.forEach(dot => {
                dot.classList.remove('active');
                dot.setAttribute('aria-selected', 'false');
            });

            // 2. تفعيل النقطة الموافقة للسلايد الحالي (event.to يعطينا رقم السلايد 0, 1, 2...)
            const currentIndex = event.to;
            if (dots[currentIndex]) {
                dots[currentIndex].classList.add('active');
                dots[currentIndex].setAttribute('aria-selected', 'true');
            }
        }
    });

    /**
     * التأكد من تشغيل خاصية التبديل التلقائي لجميع الكاروسيلات في الصفحة
     */
    const allCarousels = document.querySelectorAll('.carousel');
    allCarousels.forEach(carousel => {
        if (typeof bootstrap !== 'undefined') {
            // التأكد من تهيئة الكاروسيل أو الحصول على نسخته الحالية
            const instance = bootstrap.Carousel.getOrCreateInstance(carousel, {
                interval: 5000, // 5 ثواني
                ride: 'carousel',
                pause: 'hover'
            });
            instance.cycle(); // بدء الدوران التلقائي
        }
    });
}

/* =========================================
   دالة تبديل اللغات بأمان
========================================= */
// function initLanguageSwitcher() {
//     const langItems = document.querySelectorAll(".dropdown-item");
//     if (!langItems.length) return;

//     const currentPath = window.location.pathname;
//     const currentFile = currentPath.split("/").pop() || "index.php";

//     langItems.forEach(item => {
//         const text = item.textContent.trim();
//         let newHref = "";

//         if (currentFile.includes("-en.php")) {
//             if (text === "العربية" || text.includes("Ar")) {
//                 newHref = currentFile.replace("-en.php", ".php");
//             }
//         } else {
//             if (text === "English" || text.includes("En")) {
//                 newHref = currentFile.replace(".php", "-en.php");
//             }
//         }

//         if (newHref) item.setAttribute("href", newHref);
//     });
// }

/* =========================================
   دالة عداد الأرقام (Counter Animation)
========================================= */
function initCounters() {
    const counters = document.querySelectorAll(".count-info span");
    if (!counters.length) return;

    counters.forEach(counter => {
        const targetText = counter.textContent.trim();
        // استخراج الأرقام فقط من النص
        const target = parseInt(targetText.replace(/\D/g, ""));
        if (isNaN(target)) return;

        let current = 0;
        const duration = 2000; // مدة الأنميشن بالملي ثانية
        const stepTime = 20;
        const increment = target / (duration / stepTime);
        const suffix = targetText.replace(/[0-9]/g, ""); // الحفاظ على علامة + أو غيرها

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target + suffix;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current) + suffix;
            }
        }, stepTime);
    });
}


window.addEventListener("load", function() {
    const loader = document.getElementById("loader-wrapper");
    // إضافة كلاس الإخفاء بعد اكتمال التحميل
    loader.classList.add("loader-hidden");
    
    // حذفه من الـ DOM تماماً بعد انتهاء الأنميشن لزيادة الأداء
    loader.addEventListener("transitionend", function() {
        if (loader.parentNode) {
            loader.parentNode.removeChild(loader);
        }
    });
});