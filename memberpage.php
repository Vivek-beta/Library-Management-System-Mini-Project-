<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .heading {
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
            padding-left: 10px;
            color: white;
            text-shadow: 2px 2px 4px black;
        }
        
        body {
            overflow: hidden;
        }
        
        video.background {
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
            min-width: 100%;
            min-height: 100%;
            -webkit-filter: blur(4px); 
            filter: blur(5px);
            transform: scale(1.1);
        }
        
        /* Add shadows around the images */
        .rounded-lg {
            box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.1);
        }

    </style>

</head>
<body>
  <video autoplay muted loop src="video/library.mp4" class="background" style="filter:opacity(50%);"></video>
    <?php
    session_start();
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "lmsnew";

    // Create Connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check Connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_SESSION['userEmail'])) {
        $userEmail = $_SESSION['userEmail'];
        
        // Fetch the user's name from memberadd table using the email
        $sql = "SELECT stu_name FROM memberadd WHERE stu_email='$userEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userName = $row['stu_name'];
            
            echo '<h1 class="heading">Welcome, ' . $userName . '</h1>';
        } else {
            echo '<h1 class="heading">Welcome, User</h1>'; // Default welcome message if user's name is not found
        }
    } else {
        echo '<h1 class="heading">Welcome, User</h1>'; // Default welcome message if user is not logged in
    }
    ?>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -mx-4 -mb-10 text-center">
          <div class="sm:w-1/2 mb-10 px-4">
            <div class="rounded-lg h-64 overflow-hidden">
              <img alt="content" class="object-contain object-center shadow-2xl h-full w-full" src="html/library-animate.svg">
            </div>
            <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Browse Books</h2>
            <p class="leading-relaxed text-gray-800 text-base">Browse for Books here.</p>
            <button class="flex mx-auto mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded"><a href="browse.php">Browse</a></button>
          </div>
          <div class="sm:w-1/2 mb-10 px-4">
            <div class="rounded-lg h-64 overflow-hidden">
              <img alt="content" class="object-contain object-center h-full w-full" id="imgs" src="html/e-wallet-animate.svg">
            </div>
            <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Pay Fines And Check Enrolled</h2>
            <p class="leading-relaxed text-gray-800 text-base">You can check your enrolled books and Fines here.</p>
            <button class="flex mx-auto mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded">Pay/Check</button>
          </div>
        </div>
      </div>
    </section>
    <form method="post" action="logout.php" class="text-center">
        <input type="submit" value="Logout" class="inline-flex items-center mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded">
    </form>
</body>
</html>
