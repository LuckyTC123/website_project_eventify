<?php
include 'config.php';

// Query Total Events
$queryEvents = "SELECT COUNT(*) as total_events FROM events";
$resultEvents = $conn->query($queryEvents);
$dataEvents   = $resultEvents->fetch_assoc();
$totalEvents  = $dataEvents['total_events'];

// Query Total Users
$queryUsers = "SELECT COUNT(*) as total_users FROM users";
$resultUsers = $conn->query($queryUsers);
$dataUsers   = $resultUsers->fetch_assoc();
$totalUsers  = $dataUsers['total_users'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        /* A very basic style for clarity */
        body { font-family: Arial, sans-serif; margin: 20px; }
        .widget { margin: 15px 0; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <div class="widget">
        <h2>Overview</h2>
        <p>Total Events: <span id="totalEvents"><?php echo $totalEvents; ?></span></p>
        <p>Total Users: <span id="totalUsers"><?php echo $totalUsers; ?></span></p>
    </div>
    
    <!-- Additional dashboard widgets can be added here -->
    
    <!-- JavaScript for AJAX updates -->
    <script>
      // Function to fetch updated data from the backend
      function updateDashboardData() {
          fetch('update_dashboard.php')
              .then(response => response.json())
              .then(data => {
                  // Update the DOM elements with new data
                  document.getElementById('totalEvents').innerText = data.totalEvents;
                  document.getElementById('totalUsers').innerText = data.totalUsers;
                  // Extend here for more widgets if needed.
              })
              .catch(error => console.error('Error fetching update:', error));
      }
      
      // Poll the backend every minute
      setInterval(updateDashboardData, 60000);
      
      // Optionally, trigger an immediate update on page load:
      updateDashboardData();
    </script>
</body>
</html>