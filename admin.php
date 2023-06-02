<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
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
        
    </style>

    
</head>
<body>
  
    <video autoplay muted loop src="video/backgvid.mp4" class="background" style="filter:opacity(80%);"></video>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col">
            <div class="h-1 bg-gray-200 rounded overflow-hidden">
              <div class="w-24 h-full bg-gray-900"></div>
            </div>
            <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
              <h1 class="sm:w-2/5 text-white font-medium title-font text-2xl mb-2 sm:mb-0">Welcome<small id="adminnamemsg"></small></small></h1>
              
            </div>
          </div>
          <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
            <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
              <div class="rounded-lg h-64 overflow-hidden">
                <video  autoplay muted loop alt="content" class="object-cover object-center h-full w-full"  src="video/first.mp4" ></video>
              </div>
              <h2 class="text-xl font-medium title-font text-white mt-5">Add Books</h2>
              <p class="text-base text-gray-200 leading-relaxed mt-2">Here You Can Add Books.</p>
              <button class="inline-flex items-center mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded"><a href="bookadd.php">Add Books</a></button>

            </div>
            <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
              <div class="rounded-lg h-64 overflow-hidden">
                <video  autoplay muted loop alt="content" class="object-cover object-center h-full w-full" src="video/second.mp4">
                </div>
              <h2 class="text-xl text-white font-medium title-font text-gray-900 mt-5">Edit Or View Books</h2>
              <p class="text-base text-gray-200 leading-relaxed mt-2">Here You Can Edit Or View Book Details.</p>
              <button class="inline-flex items-center mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded"><a href="view_books.php">Edit Or View</a></button>
              
            </div>
            <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
              <div class="rounded-lg h-64 overflow-hidden">
                <img alt="content" class="object-cover object-center h-full w-full" src="image/memer.jpeg">
              </div>
              <h2 class="text-xl text-white font-medium title-font text-gray-900 mt-5">Edit Or View Members</h2>
              <p class="text-base text-gray-200 leading-relaxed mt-2">Here You Can Edit Or View Member Details.</p>
              <button class="inline-flex items-center mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded"><a href="view_members.php">Edit Or View</a></button>
              
             
       
            </div>
          </div>
        </div>
      </section>
      <form method="post" action="logout.php" class="text-center">
    <input type="submit" value="Logout" class="inline-flex items-center mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-900 rounded">
</form>


</body>
</html>
