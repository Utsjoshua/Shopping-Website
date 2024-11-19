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
          <li><a class="subtitle" href="shopping_cart.php"><span class="fa fa-shopping-cart"></span> Return to Shopping Cart</a></li>
        </ul>
      </nav>
    </header>

    <h1>Order Details Form</h1>

    <div class="container">
        <h2>Please Fill out your:</h2>
        <form id="customerForm" action="order_confirmation.php" method="post">

            <h3> First Name: </h3>
            <input class="field" type="text" name="firstname" placeholder="First Name" required>

            <h3> Last Name: </h3>
            <input class="field" type="text" name="lastname" placeholder="Last Name" required>

            <h3> Address: </h3>

            <h4> Street: </h4>
            <input class="field" type="text" name="address_street" placeholder="Street" required>

            <h4> City: </h4>
            <input class="field" type="text" name="address_city" placeholder="City" required>

            <h4> State: </h4>
            <select name="address_state" required>
                <option value="">Select State/Territory</option>
                <option value="NSW">NSW</option>
                <option value="VIC">VIC</option>
                <option value="QLD">QLD</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
                <option value="NT">NT</option>
                <option value="Other">Other</option>
            </select>

            <h3> Phone number: </h3>
            <input class="field" type="tel" name="phone" placeholder="Phone" required>

            <h3> Email: </h3>
            <input class="field" type="email" name="email" placeholder="Email" required>

            <button type="submit" id="submitBtn" disabled>Submit</button>
        </form>
    </div>

  </body>

</html>