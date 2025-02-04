<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign-in | Foodsta </title>
  <style>
    /* Reset default browser styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #F7F7F7;
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #F8BC25;
      padding: 15px 20px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo img {
      width: 120px;
    }

    .nav-links {
      list-style: none;
      display: flex;
    }

    .nav-links li {
      margin-left: 20px;
    }

    .nav-links a {
      text-decoration: none;
      color: #DA291C;
      font-size: 18px;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: #FFFFFF;
    }

    .burger {
      display: none;
      cursor: pointer;
      flex-direction: column;
      justify-content: space-between;
      height: 21px;
    }

    .burger div {
      width: 25px;
      height: 3px;
      background-color: #DA291C;
      border-radius: 10px;
    }

    /* Contact Section */
    .contact-section {
      padding: 50px 20px;
      text-align: center;
    }

    .contact-section h2 {
      font-size: 2.5em;
      margin-bottom: 20px;
      color: #DA291C;
    }

    .contact-section p {
      font-size: 1.2em;
      margin-bottom: 40px;
    }

    .contact-form {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .contact-form input[type="submit"] {
      background-color: #DA291C;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .contact-form input[type="submit"]:hover {
      background-color: #F8BC25;
      color: #DA291C;
    }

    /* Footer Section */
    .footer {
      background-color: #333;
      color: white;
      padding: 20px;
      text-align: center;
    }

    .footer p {
      margin-bottom: 10px;
    }

    .footer a {
      color: #F8BC25;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
      }

      .nav-links li {
        margin: 10px 0;
      }

      .burger {
        display: flex;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="real-logo.jpeg" alt="Burger King Logo" />
    </div>
    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="menu.html">Menu</a></li>
      <li><a href="deals.html">Deals</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>

  <section class="contact-section">
    <h2>Sign-in</h2>
    <form class="contact-form" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="tel" name="phone" placeholder="Your Phone" required>
      <!-- Changed input name to "date" -->
      <input type="date" name="date" placeholder="Select Date" required>
      <!-- Changed input name to "location" -->
      <input type="text" name="location" placeholder="Your Address" required>
      <input type="submit" value="Sign In">
    </form>
  </section>

  <footer class="footer">
    <p>© 2024 Foodsta</p>
    <p>Made with <span style="color: red;">&#9829;</span> by the Foodst Team</p>
  </footer>

  <?php
  // Check if the form has been submitted
  if (isset($_POST['Sign In'])) {
      // Set connection variables
      $server = "localhost";
      $username = "root";
      $password = "";

      // Create a database connection
      $con = mysqli_connect($server, $username, $password);
      
      

      // Check for connection success
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Collect post variables with the correct names from the form
      $name     = $_POST['name'];
      $email    = $_POST['email'];
      $phone    = $_POST['phone'];
      $dob     = $_POST['dob'];
      $add = $_POST['add'];


      $sql = "INSERT INTO `login` (`sno`, `name`, `email`, `phone`, `dob`, `add`, `dt`) VALUES ( '$name', '$email', '$phone', '$dob', '$add', 'current_timestamp());";

      // Execute the query
      if ($con->query($sql) === true) {
          // Successfully inserted, output a success message.
          echo "<p style='text-align:center; color:green;'>Sign-in successful!</p>";
      } else {
          echo "ERROR: $sql <br>" . $con->error;
      }

      // Close the database connection
      $con->close();
  }
  ?>
</body>

</html>
