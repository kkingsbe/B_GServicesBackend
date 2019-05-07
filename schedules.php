<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="kensingtonbk.css">

        <title>Active Schedules</title>
    </head>
    <body>
        <nav class = "navbar-expand-sm bg-light navbar-light sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PlaceHolder 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Placeholder 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Placeholder 3</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
        $servername = "localhost";
        $username = "bkuser";
        $password = "GtF6XlmZDnL1";
        $dbname = "bkservices";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT jobid, date, first, last, address, email, phone, price, reoccuring, services FROM ActiveSchedules";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-dark">';
            echo "<thead>"; 
            echo "<tr>";
            echo "<th>JobID</th>";
            echo "<th>Date</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Address</th>";
            echo "<th>Email</th>";
            echo "<th>Phone #</th>";
            echo "<th>Price</th>";
            echo "<th>Reoccuring</th>";
            echo "<th>Services</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo "<td>". $row["jobid"]. "</td>";
                echo "<td>". $row["date"]. "</td>";
                echo "<td>". $row["first"] . "</td>";
                echo "<td>". $row["last"] . "</td>";
                echo "<td>". $row["address"] . "</td>";
                echo "<td>". $row["email"] . "</td>";
                echo "<td>". $row["phone"] . "</td>";
                echo "<td>$". $row["price"] . "</td>";
                echo "<td>". $row["reoccuring"] . "</td>";
                echo "<td>". $row["services"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?> 

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    <style>
        body{
            background-color: #454d55;
        }
    </style>
</html>