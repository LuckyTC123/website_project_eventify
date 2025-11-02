<?php
include 'config.php';

// Query Total Events
$queryEvents = "SELECT COUNT(*) as total_events FROM myform";
$resultEvents = $conn->query($queryEvents);
$dataEvents   = $resultEvents->fetch_assoc();
$totalEvents  = $dataEvents['total_events'];

// Query Total Users
$queryUsers = "SELECT message as total_users FROM myform";
$resultUsers = $conn->query($queryUsers);
$dataUsers   = $resultUsers->fetch_assoc();
$totalUsers  = $dataUsers['total_users'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <div class="widgets">
        <div class="widget">
            <h2>Overview</h2>
            <p>Total Events: <span id="totalEvents"><?php echo $totalEvents; ?></span></p>
            <p>message Users: <span id="totalUsers"><?php echo $totalUsers; ?></span></p>
        </div>
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