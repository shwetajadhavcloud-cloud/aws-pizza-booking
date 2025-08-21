<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizza Bookings - Admin Panel</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f4f4f9; margin:0; padding:0; }
    .container { width: 90%; margin: 30px auto; background:white; padding:20px; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.1); }
    h2 { text-align:center; color:#e63946; }
    table { width:100%; border-collapse: collapse; margin-top:20px; }
    th, td { border:1px solid #ddd; padding:10px; text-align:center; }
    th { background:#e63946; color:white; }
    tr:nth-child(even) { background:#f9f9f9; }
    .no-data { text-align:center; color:gray; font-size:18px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>🍕 Pizza Booking Admin Panel</h2>
    <?php
    // Connect to RDS MySQL
    $conn = new mysqli("YOUR-RDS-ENDPOINT","admin","YourPassword123","pizza");

    if($conn->connect_error){
        die("<p style='color:red;text-align:center;'>Database Connection Failed</p>");
    }

    $sql = "SELECT * FROM bookings ORDER BY id DESC";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Guests</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['booking_date']."</td>
                    <td>".$row['guests']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-data'>No bookings yet 🚫</p>";
    }

    $conn->close();
    ?>
  </div>
</body>
</html>
