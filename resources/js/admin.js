// // import jQuery from 'jquery';
// // window.$ = jQuery;
// // import 'jquery.easing';

import jszip from 'jszip';
import pdfmake from 'pdfmake';
import DataTable from 'datatables.net-bs4';
import 'datatables.net-buttons-bs4';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-responsive-bs4';


// // $(document).ready(function () {


// //     !function (l) {
// //         "use strict";
// //         l("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
// //             l("body").toggleClass("sidebar-toggled"),
// //                 l(".sidebar").toggleClass("toggled"),
// //                 l(".sidebar").hasClass("toggled") && l(".sidebar .collapse").collapse("hide")
// //         }),
// //             l(window).resize(function () {
// //                 l(window).width() < 768 && l(".sidebar .collapse").collapse("hide"),
// //                     l(window).width() < 480 && !l(".sidebar").hasClass("toggled") && (l("body").addClass("sidebar-toggled"),
// //                         l(".sidebar").addClass("toggled"), l(".sidebar .collapse").collapse("hide"))
// //             }),
// //             l("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel",
// //                 function (e) {
// //                     var o;
// //                     768 < l(window).width() && (o = (o = e.originalEvent).wheelDelta || -o.detail, this.scrollTop += 30 * (o < 0 ? 1 : -1),
// //                         e.preventDefault())
// //                 }), l(document).on("scroll",
// //                     function () {
// //                         100 < l(this).scrollTop() ? l(".scroll-to-top").fadeIn() : l(".scroll-to-top").fadeOut()
// //                     }), l(document).on("click", "a.scroll-to-top",
// //                         function (e) {
// //                             var o = l(this);
// //                             l("html, body").stop().animate({ scrollTop: l(o.attr("href")).offset().top },
// //                                 1e3, "easeInOutExpo"), e.preventDefault()
// //                         })
// //     }(jQuery);





// //     // When the user scrolls down 20px from the top of the document, show the button
// //     window.onscroll = function () {
// //         scrollFunction();
// //     };

// //     function scrollFunction() {
// //         var button = document.getElementById("scrollToTopButton");
// //         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
// //             button.style.display = "block";
// //         } else {
// //             button.style.display = "none";
// //         }
// //     }

// //     // When the button is clicked, scroll to the top of the document
// //     document.getElementById("scrollToTopButton").addEventListener("click", function () {
// //         scrollToTop();
// //     });

// //     function scrollToTop() {
// //         document.body.scrollTop = 0; // For Safari
// //         document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
// //     }


// // });


// import jQuery from 'jquery';
// // import 'bootstrap';
// window.$ = jQuery;
// import 'jquery.easing';

// import jszip from 'jszip';
// import pdfmake from 'pdfmake';
// import DataTable from 'datatables.net-bs4';
// import 'datatables.net-buttons-bs4';
// import 'datatables.net-buttons/js/buttons.colVis.mjs';
// import 'datatables.net-buttons/js/buttons.html5.mjs';
// import 'datatables.net-buttons/js/buttons.print.mjs';
// import 'datatables.net-responsive-bs4';


// (function($) {
//     "use strict";

//     $(document).ready(function() {

//         $("#sidebarToggle, #sidebarToggleTop").on("click", function(e) {
//             $("body").toggleClass("sidebar-toggled");
//             $(".sidebar").toggleClass("toggled");
//             if ($(".sidebar").hasClass("toggled")) {
//                 $(".sidebar .collapse").collapse("hide");
//             }
//         });

//         $(window).resize(function() {
//             if ($(window).width() < 768) {
//                 $(".sidebar .collapse").collapse("hide");
//             }
//             if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
//                 $("body").addClass("sidebar-toggled");
//                 $(".sidebar").addClass("toggled");
//                 $(".sidebar .collapse").collapse("hide");
//             }
//         });

//         $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function(e) {
//             if ($(window).width() > 768) {
//                 var o = e.originalEvent;
//                 var delta = o.wheelDelta || -o.detail;
//                 this.scrollTop += 30 * (delta < 0 ? 1 : -1);
//                 e.preventDefault();
//             }
//         });

//         $(window).scroll(function() {
//             if ($(this).scrollTop() > 100) {
//                 $(".scroll-to-top").fadeIn();
//             } else {
//                 $(".scroll-to-top").fadeOut();
//             }
//         });

//         $("a.scroll-to-top").click(function(e) {
//             var target = $(this).attr("href");
//             $("html, body").stop().animate({
//                 scrollTop: $(target).offset().top
//             }, 1000, "easeInOutExpo");
//             e.preventDefault();
//         });

//     });

//     // When the user scrolls down 20px from the top of the document, show the button
//     $(window).scroll(function() {
//         scrollFunction();
//     });

//     function scrollFunction() {
//         var button = document.getElementById("scrollToTopButton");
//         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//             button.style.display = "block";
//         } else {
//             button.style.display = "none";
//         }
//     }

//     // When the button is clicked, scroll to the top of the document
//     $("#scrollToTopButton").click(function() {
//         scrollToTop();
//     });

//     function scrollToTop() {
//         document.body.scrollTop = 0; // For Safari
//         document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
//     }

// })(jQuery);
