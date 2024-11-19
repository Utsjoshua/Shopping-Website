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

          <li class="dropdown">
            <a class="subtitle" href="#"><span class="fa fa-snowflake-o"></span> Frozen</a>
            <ul class="dropdown-menu">
              <li><a href="#"></a>Meat</li>
              <li><a href="#"></a>Frozen meals</li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="subtitle" href="#"><span class="fa fa-envira"></span> Fresh</a>
            <ul class="dropdown-menu">
              <li><a href="#"></a>Fruits</li>
              <li><a href="#"></a>Vegetables</li>
              <li><a href="#"></a>Dairy</li>
              <li><a href="#"></a>Beverages</li>
              <li><a href="#"></a>Snacks</li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="subtitle" href="#"><span class="fa fa-home"></span> Home Health</a>
            <ul class="dropdown-menu">
              <li><a href="#"></a>Cleaning appliances</li>
              <li><a href="#"></a>Medicine</li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="subtitle" href="#"><span class="fa fa-paw"></span> Pet Foods</a>
            <ul class="dropdown-menu">
              <li><a href="#"></a>Dog</li>
              <li><a href="#"></a>Bird</li>
              <li><a href="#"></a>Cat</li>
              <li><a href="#"></a>Fish</li>
            </ul>
          </li>

          <li><a class="subtitle" href="shopping_cart.php"><span class="fa fa-shopping-cart"></span> Shopping Cart</a></li>

        </ul>

      </nav>

      <div class="search-bar">
        <form id="searchForm" method="GET">
            <input type="text" name="search" id="searchInput" placeholder="Search for a product...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>

    </header> 

    <h1> Grocery List </h1>
    
    <div class="grid-container">
      <?php
      // Connect to MySQL
      $mysqli = new mysqli("localhost", "root", "", "assignment1");

      // Check connection
      if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
      }

      // Query the database
      $result = $mysqli->query("SELECT * FROM products");

      // Display results
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<div class="grid-item">';
          echo '<img src="Images/' . $row['product_id'] . '.png" alt="' . $row['product_name'] . '">';
          echo '<h2>' . $row['product_name'] . '</h2>';
          echo '<p>Cost: ' . $row['unit_price'] . '</p>';
          echo '<p>Quantity: ' . $row['unit_quantity'] . '</p>';
          echo '<p>Stock: ' . $row['in_stock'] . '</p>';
          // This button will add the corresponding item onto the shopping cart and can be viewed in shopping_cart.php. This is handled in cart.js.
          echo '<button class="add-to-cart" data-item-image="Images/' . 
          $row['product_id'] . '.png" data-item-name="' . 
          $row['product_name'] . '" data-item-price="' . 
          $row['unit_price'] . '">Add to Cart</button>';
          echo '</div>';
        }
      } else {
        echo "0 results";
      }

      // Close connection
      $mysqli->close();
      ?>
    </div>

  </body>

</html>