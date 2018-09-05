/*
** Admin Bar Offset | Alvin Sanchez
*/
window.onload = function () {

    const adminBarOffset = (function(){

        'use strict';

        var adminBar = document.getElementById("wpadminbar");
        var siteHeader = document.querySelector(".site-header");
        var sitePrimaryNav = document.querySelector(".nav-primary");

        if(adminBar){

            siteHeader.className += " site-header-offset";
            sitePrimaryNav.className += " site-primary-nav-offset";

        }

    }());

}
/*
**
*/
