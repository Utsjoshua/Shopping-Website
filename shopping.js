document.addEventListener("DOMContentLoaded", function() {

    // Select all 'Add to Cart' buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    // Gets the cart items
    let cartItems = JSON.parse(localStorage.getItem('cart'));

    // Add click event listener to each button
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {

            // Get the item information from the button
            const itemImage = event.target.dataset.itemImage
            const itemName = event.target.dataset.itemName;
            const itemPrice = event.target.dataset.itemPrice;

            // Create an object to represent the item
            const item = {
                image: itemImage,
                name: itemName,
                price: itemPrice
            };

            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

            // Add the new item to the cart
            cartItems.push(item);

            // Store the updated cart items back into local storage
            localStorage.setItem('cart', JSON.stringify(cartItems));
        });
    });

    // Function to update local storage and refresh checkout list
    function updateCartAndRefresh() {
        localStorage.setItem('cart', JSON.stringify(cartItems));
        refreshCheckoutList();
        updateTotalCost();
        updateCheckoutButton();
        updateClearAllButton();
        updateHideButton();
    }

    // Function to refresh the checkout list
    function refreshCheckoutList() {

        // Gets the "ul" element for the shopping list to be added into from the shopping_cart.php
        const checkoutList = document.getElementById('checkout-list');
        checkoutList.innerHTML = '';

        cartItems.forEach(function(item) {
            const listItem = document.createElement('li');
            
            // Display item image
            const image = document.createElement('img');
            image.src = item.image;
            image.alt = item.name;

            // Display item name
            const itemName = document.createElement('span');
            itemName.textContent = `${item.name}:`;

            // Display item price
            const itemPrice = document.createElement('span');
            itemPrice.textContent = `$${item.price}`;

            // "+" button to duplicate/add item
            const plusButton = document.createElement('button');
            plusButton.textContent = '+';
            // Function for duplicating the item
            plusButton.addEventListener('click', function() {
                cartItems.push(item); // Add a duplicate item
                updateCartAndRefresh();
            });

            // "-" button to remove item
            const minusButton = document.createElement('button');
            minusButton.textContent = '-';
            // Function for removing the item
            minusButton.addEventListener('click', function() {
                const index = cartItems.indexOf(item);
                if (index !== -1) {
                    cartItems.splice(index, 1); // Remove item from array
                    updateCartAndRefresh();
                }
            });

            // Add each element onto the list item (li) element
            // Then add that list item onto the shopping list (ul element)
            listItem.appendChild(image);
            listItem.appendChild(itemName);
            listItem.appendChild(itemPrice);
            listItem.appendChild(plusButton);
            listItem.appendChild(minusButton);
            checkoutList.appendChild(listItem);
        });

        if (cartItems.length === 0) {
            // Display a message if the cart is empty
            const emptyCartMessage = document.createElement('p');
            emptyCartMessage.textContent = 'Your cart is empty.';
            checkoutList.appendChild(emptyCartMessage);
        }
    }

    // Function to handle clearing all items
    function clearAllItems() {
        cartItems = []; // Empty the cart array
        updateCartAndRefresh(); // Update local storage and refresh checkout list
    }

    // Function to update the total cost
    function updateTotalCost() {
        const totalAmountElement = document.getElementById('total-amount');
        let totalCost = 0;

        cartItems.forEach(function(item) {
            totalCost += parseFloat(item.price);
        });

        totalAmountElement.textContent = totalCost.toFixed(2);
    }

    // Function to update the state of the "Checkout" button
    function updateCheckoutButton() {
        const checkoutButton = document.getElementById('checkout-btn');
        if (cartItems.length > 0) {
            checkoutButton.removeAttribute('disabled');
        } else {
            checkoutButton.setAttribute('disabled', 'disabled');
        }
    }

    // Function to update the state of the "Clear All" button
    function updateClearAllButton() {
        const clearAllButton = document.getElementById('clear-all-btn');
        if (cartItems.length > 0) {
            clearAllButton.removeAttribute('disabled');
        } else {
            clearAllButton.setAttribute('disabled', 'disabled');
        }
    }

    // Function to update the state of the "Hide" button
    function updateHideButton() {
        const hideButton = document.getElementById('hide-btn');
        if (cartItems.length > 0) {
            hideButton.removeAttribute('disabled');
        } else {
            hideButton.setAttribute('disabled', 'disabled');
        }
    }

    // Function to hide and show the items on the checkout list
    function toggleHideItems() {
        const checkoutList = document.getElementById('checkout-list');
        const hideButton = document.getElementById('hide-btn');

        if (checkoutList.classList.contains('hidden')) {
            checkoutList.classList.remove('hidden');
            hideButton.textContent = 'Hide';
        } else {
            checkoutList.classList.add('hidden');
            hideButton.textContent = 'Show';
        }
    }

    // Add event listener to the "Clear All" button
    document.getElementById('clear-all-btn').addEventListener('click', clearAllItems);
    document.getElementById('hide-btn').addEventListener('click', toggleHideItems);

    // Add event listener to the "Checkout" button
    // Then Open the order_details.php page.
    document.getElementById('checkout-btn').addEventListener('click', function() {
        window.location.href = 'order_details.php';
    });

    // On first opening the shopping_cart.php webpage, do this:
    refreshCheckoutList();
    updateTotalCost();
    updateCheckoutButton();
    updateClearAllButton();
    updateHideButton();
});

// This section handles the form on the order_details.php
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("customerForm");
    var submitBtn = document.getElementById("submitBtn");

    submitBtn.addEventListener("click", function(){
        localStorage.removeItem('cart');
    });

    document.getElementById("customerForm").addEventListener("input", function() {
        var isValid = form.checkValidity();
        submitBtn.disabled = !isValid;
    });
});
