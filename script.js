// /* FadeIn Scroll */
// $(document).ready(function() {
    
//   /* Every time the window is scrolled ... */
//   $(window).scroll( function(){
  
//       /* Check the location of each desired element */
//       $('.row').each( function(i){
          
//           var bottom_of_object = $(this).position().top + $(this).outerHeight();
//           var bottom_of_window = $(window).scrollTop() + $(window).height();
          
//           /* If the object is completely visible in the window, fade it it */
//           if( bottom_of_window > bottom_of_object ){
              
//               $(this).animate({'opacity':'1'},900);
                  
//           }
          
//       }); 
  
//   });
  
// });
// const header = document.querySelector("header");
// const sectionOne = document.querySelector(".home-intro");

const faders = document.querySelectorAll(".row");
// const sliders = document.querySelectorAll(".slide-in");

// const sectionOneOptions = {
//   rootMargin: "-200px 0px 0px 0px"
// };

// const sectionOneObserver = new IntersectionObserver(function(
//   entries,
//   sectionOneObserver
// ) {
//   entries.forEach(entry => {
//     if (!entry.isIntersecting) {
//       header.classList.add("nav-scrolled");
//     } else {
//       header.classList.remove("nav-scrolled");
//     }
//   });
// },
// sectionOneOptions);

// sectionOneObserver.observe(sectionOne);

const appearOptions = {
  threshold: 0,
  rootMargin: "0px 0px -250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(
  entries,
  appearOnScroll
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
      appearOnScroll.unobserve(entry.target);
    }
  });
},
appearOptions);

faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

// sliders.forEach(slider => {
//   appearOnScroll.observe(slider);
// });