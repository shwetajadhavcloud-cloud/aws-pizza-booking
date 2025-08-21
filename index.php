<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizza Booking</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f8f8f8; margin:0; padding:0; }
    .container { width: 500px; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    h2 { text-align: center; color: #e63946; }
    input, select { width: 100%; padding: 10px; margin: 10px 0; border:1px solid #ccc; border-radius: 5px; }
    button { background: #e63946; color:white; padding:10px; border:none; width:100%; border-radius: 5px; font-size:16px; }
    button:hover { background:#d62828; cursor:pointer; }
    .success { color: green; font-weight: bold; text-align: center; }
  </style>
</head>
<body>
  <div class="container">
    <h2>🍕 Pizza Booking Form</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <input type="date" name="booking_date" required>
      <input type="number" name="guests" placeholder="Number of Guests" required>
      <button type="submit" name="submit">Book Now</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $conn = new mysqli("YOUR-RDS-ENDPOINT","admin","YourPassword123","pizza");
        if($conn->connect_error){
            die("<p style='color:red'>DB Connection Failed</p>");
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['booking_date'];
        $guests = $_POST['guests'];

        $sql = "INSERT INTO bookings (name,email,phone,booking_date,guests) VALUES ('$name','$email','$phone','$date','$guests')";
        if($conn->query($sql) === TRUE){
            echo "<p class='success'>Booking Successful 🎉</p>";
        } else {
            echo "<p style='color:red'>Error: " . $conn->error . "</p>";
        }
        $conn->close();
    }
    ?>
  </div>
</body>
</html>
