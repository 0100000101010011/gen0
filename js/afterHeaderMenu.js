/*
** After Header Menu | Alvin Sanchez
*/
const afterHeaderMenu = (function(){
    //use strict here is not working, which means this code needs to be refactored for
    // 'use strict';

    /* # Toggle Primary Menu
    ---------------------------------------------------------------------------------------------------- */

    //declarations
    //use .from to convert array-like objects to an array of elements in the document with the .trigger class
    const triggers = Array.from(document.querySelectorAll(".trigger"));

    const breadCrumbAnchors = document.querySelectorAll(".content .breadcrumb a");

    const triggerIcon = document.querySelector(".trigger-icon");

    const primaryNavContainer = document.querySelector(".nav-primary");

    //if a .trigger class exists anywhere in the document
    if(triggers){

        //add a click event to fire off the toggleShowHidePrimaryNav function
        for(i = 0; i < triggers.length; i++) {
            triggers[i].addEventListener("click", toggleShowHidePrimaryNav);
        }

    }

    //functions
    function toggleShowHidePrimaryNav (e){

        e.preventDefault();

        if(primaryNavContainer.classList.contains("show")) {
            primaryNavContainer.classList.remove("show");
            triggerIcon.className += " trigger-icon";
        } else {
            primaryNavContainer.className += " show";
            triggerIcon.classList.remove("trigger-icon");
        }

    }

}());
/*
**
*/
