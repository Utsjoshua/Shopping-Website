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
        </ul>
      </nav>
    </header>

    <h1> Order Confirmation</h1>

    <div class="container">
        <h2>Thank you</h2>
        <p>Thank you for submitting your details. A confirmation email should be sent to your email address. Here is a summary:</p>
        <ul>
            <li><strong>Name:</strong> <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></li>
            <li><strong>Address:</strong> <?php echo $_POST['address_street'] . ', ' . $_POST['address_city'] . ', ' . $_POST['address_state']; ?></li>
            <li><strong>Phone:</strong> <?php echo $_POST['phone']; ?></li>
            <li><strong>Email:</strong> <?php echo $_POST['email']; ?></li>
        </ul>

        <a class="finish" href="index.php"><span class="fa fa-chevron-left"></span> Return to products</a>
    </div>
    
  </body>

</html>