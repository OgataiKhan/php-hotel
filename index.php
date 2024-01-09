<?php
$parking_input = $_GET['parking'] ?? 'no';
$vote_input = $_GET['vote'] ?? 'none';

// Data
$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- /Bootstrap -->
</head>

<body>
  <main class="container">
    <h1 class="text-center pt-5 pb-3">Hotels</h1>
    <!-- Filter form -->
    <form action="index.php" method="GET">
      <select name="parking" class="form-select form-select-lg mb-3" aria-label="Parking requirement">
        <option value="no" selected>Parking required?</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
      <select name="vote" class="form-select form-select-lg mb-3" aria-label="Minimum vote">
        <option value="none" selected>Minimum vote?</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </form>
    <!-- /Filter form -->
    <!-- Hotels Table -->
    <table class="table mt-4">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Parking</th>
        <th>Vote</th>
        <th>Distance to Center</th>
      </tr>
      <?php
      foreach ($hotels as $hotel) {
        if (($parking_input === 'no' || ($parking_input === 'yes' && $hotel['parking'] === true)) && ($vote_input === 'none' || $hotel['vote'] >= $vote_input)) {
          echo '<tr>';
          foreach ($hotel as $info) {
            if ($info === true) {
              echo "<td>Yes</td>";
            } elseif ($info === false) {
              echo "<td>No</td>";
            } else {
              echo "<td>$info</td>";
            };
          };
          echo '</tr>';
        };
      };
      ?>
    </table>
    <!-- /Hotels Table -->
  </main>
</body>

</html>