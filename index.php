<!DOCTYPE html>
<html>
<head>
    <title>Service Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Service Status</h1>
        <p class="text-center">Checking the availability of services on IP address 62.210.38.117</p>

        <div class="row">
            <?php
            function checkServiceStatus($host, $port, $service) {
                $socket = @fsockopen($host, $port, $errno, $errstr, 5);

                echo '<div class="col-md-6">';
                echo '<div class="card mb-3';

                if ($socket) {
                    echo ' bg-success';
                } else {
                    echo ' bg-danger';
                }

                echo '">';
                echo '<div class="card-body text-white">';

                if ($socket) {
                    echo "<h5 class='card-title'>Port $port: $service</h5>";
                    echo "<p class='card-text'>Service is UP</p>";
                } else {
                    echo "<h5 class='card-title'>Port $port: $service</h5>";
                    echo "<p class='card-text'>Service is DOWN</p>";
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';

                if ($socket) {
                    fclose($socket);
                }
            }

            $ipAddress = '62.210.38.117';
            $services = [
                ['port' => 443, 'name' => 'HTTPS'],
                ['port' => 53, 'name' => 'DNS'],
            ];

            foreach ($services as $service) {
                checkServiceStatus($ipAddress, $service['port'], $service['name']);
            }
            ?>
        </div>
    </div>
</body>
</html>
