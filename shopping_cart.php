<!DOCTYPE html>
<html>
  <head>
    <title> Harvet Markets </title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="shopping.js" defer></script>
  </head>

  <body>
    <header>

      <div class="logo">
        <img src="Images/Logo.png" alt="Logo">
      </div>

      <div class="separator"></div>

      <nav>
        <ul>
          <li><a class="title" href="index.php">Harvest Markets</a></li>
          <li><a class="subtitle" href="index.php"><span class="fa fa-chevron-left"></span> Return to products</a></li>
          <li><a class="subtitle" href="shopping_cart.php"><span class="fa fa-shopping-cart"></span> Shopping Cart</a></li>
        </ul>
      </nav>
    </header>

    <h1>Shopping Cart</h1>

    <div class="cart">
      <ul id="checkout-list">
        <!--    Below is for when the user has added an item to their cart. Below will be repeated for each item. This is all handled by cart.js    -->
        <!--<li>-->
          <!--<img src="Item Image" alt="Item Name">-->
          <!--<span> Item Name </span>-->
          <!--<span> Item Price </span>-->
          <!--<button> + </button>-->
          <!--<button> - </button>-->
        <!--</li>-->

        <!--    Below is for when the user has not added an item to their cart. This message displays when the cart is empty    -->
        <!--<p> Your cart is empty </p>-->
      </ul>

      <div class="checkout-options">
        <!--    This button clears all items in the shopping cart. It is handled by cart.js    -->
        <button id="clear-all-btn">Clear All</button>

        <!--    This button hides all items in the shopping cart. It is handled by cart.js    -->
        <button id="hide-btn">Hide</button>

        <!--    This "span" element should display the total cost of all items in the shopping cart. It is handled by cart.js    -->
        <p id="total-cost">Total Cost: $<span id="total-amount">0.00</span></p>

        <!--    This button will only be enabled when there is at least one item in the shopping list. Once pressed, it will open order_details.php. 
        This is handled by cart.js    -->
        <button id="checkout-btn" disabled>Place An Order</button>
      </div>

    </div>
    
  </body>

</html>