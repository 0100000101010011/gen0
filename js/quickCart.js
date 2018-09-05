/*
** Quick Cart | Alvin Sanchez
*/
'use strict';
const quickCartUI = (function() {

    var DOMstrings = {
        cartBtn: 'dashicons-cart',
        cartBtnToggle: 'dashicons__cart--toggle',
        cartWidget: 'widget_shopping_cart',
        cartWidgetToggle: 'widget__cart--toggle',
        cartWidgetDisabled: 'widget__cart--disabled'
    };

    return {
        getDomStrings: () => {
            return DOMstrings;
        }
    }

}());

const quickCartControl = (function(ui) {

    var DOM = ui.getDomStrings();

    var setupEventListeners = () => {

    var cartButton = document.querySelector(`.${DOM.cartBtn}`);
    var quickCart = document.querySelector(`.${DOM.cartWidget}`);

        if(quickCart){

            cartButton.addEventListener('click', function(e){

                e.preventDefault();

                toggleCart(cartButton, quickCart);

            });

            quickCart.addEventListener('mouseleave', function(e){
                toggleCart(cartButton, quickCart);
            });

        } else {

            cartIcon.classList += ` ${DOM.cartWidgetDisabled}`;
        }

    };

    function toggleCart(cartButton, quickCart) {
        cartButton.classList.toggle(DOM.cartBtnToggle);
        quickCart.classList.toggle(DOM.cartWidgetToggle);
    }

    return {
        init: () => {

            setupEventListeners();

        }
    }

}(quickCartUI));

quickCartControl.init();
/*
**
*/
