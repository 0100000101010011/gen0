/*
** Header Search | Alvin Sanchez
*/
const headerSearch = (function(){

    'use strict';

    //res: https://stackoverflow.com/questions/28608023/removing-an-element-added-by-before-pseudo-selector
    var headerSearchTrigger = document.querySelector(".header-search");
    var headerSearchTriggerBefore = document.querySelector(".header-search a");
    var headerSearchWidget = document.querySelector(".header-widget-area .widget_search");

    headerSearchTrigger.addEventListener('click', toggleSearch);

    function toggleSearch(e){

        e.preventDefault();

        if(headerSearchTrigger){

            if(headerSearchWidget.classList.contains("show")) {


                headerSearchWidget.classList.remove("show");

                    //remove this "close"? cause i don't see it in css
                    headerSearchTriggerBefore.classList.remove("close");

                } else {

                    headerSearchWidget.className += " show";
                    headerSearchTriggerBefore.className += " close";
                    clickedOutside();
                }

            }

        }

    //res: https://stackoverflow.com/questions/14188654/detect-click-outside-element-vanilla-javascript
    function clickedOutside() {
        document.addEventListener('click', function(event) {
          var isClickInside = headerSearchWidget.contains(event.target);
          var searchTrigger = headerSearchTrigger.contains(event.target);
          console.log(searchTrigger);
          if (!isClickInside && !searchTrigger) {
                // alert('clicked outside');
                headerSearchWidget.classList.remove("show");
                headerSearchTriggerBefore.classList.remove("close");

            }
        });
    }

}());
/*
**
*/
