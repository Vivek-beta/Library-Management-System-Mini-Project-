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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', 'Arial', 'sans-serif';
            font-size: 30px;
            padding-left: 10px;
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
    <h1 class="heading">Welcome, User</h1>
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
