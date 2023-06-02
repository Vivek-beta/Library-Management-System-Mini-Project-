<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script> 
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
<script>
    function redirectToIndex() {
        window.location.href = "index.php";
    }
</script>
</head>
<body>
    <video autoplay muted loop src="video/bgvideo.mp4" class="background"></video>
    <div class="flex items-center justify-center text-center  w-[100%] h-[100%]">
        <div class="flex flex-col items-center justify-center rounded-tr-full rounded-bl-full w-full  ">
          <div class="flex flex-col p-2 m-2 w-full">
            <div class="text-xl md:text-3xl font-medium text-gray-100">Our Team</div>
  
            <div
              class="flex items-center justify-center md:flex-row flex-col space-x-4 space-y-4 p-2"
            >
              <div
                class="flex-col px-6 py-2 shadow-xl rounded-2xl hover:scale-105 w-[90%] md:w-1/4 bg-gray-50"
              >
                <div
                  class="h-40 w-40 border-2 border-cyan-500 rounded-full overflow-hidden bg-gray-200"
                >
                  <img
                  src="image/amith.jpeg"
                    alt=""
                    class=""
                  />
                </div>
  
                <div
                  class="text-lg font-medium text-stone-600 cursor-pointer hover:text-stone-400"
                >
                  Amith MP
                </div>
                <div class="italic text-gray-500 text-sm">Frontend</div>
                <div class="flex my-2">
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-twitter"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-instagram"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-facebook"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-linkedin"></i
                  ></a>
                </div>
              </div>
              <div
                class="flex-col px-6 py-2 shadow-xl rounded-2xl hover:scale-105 w-[90%] md:w-1/4 bg-gray-100"
              >
                <div
                  class="h-40 w-40 border-2 border-cyan-500 rounded-full overflow-hidden bg-gray-200"
                >
                  <img
                  src="image/arjun.jpeg"
                    alt=""
                    class=""
                  />
                </div>
  
                <div
                  class="text-lg font-medium text-stone-600 cursor-pointer hover:text-stone-400"
                >
                  Arjun S
                </div>
                <div class="italic text-gray-500 text-sm">Frontend</div>
                <div class="flex my-2">
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-twitter"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-instagram"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-facebook"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-linkedin"></i
                  ></a>
                </div>
              </div>
              <div
                class="flex-col px-6 py-2 shadow-xl rounded-2xl hover:scale-105 w-[90%] md:w-1/4 bg-gray-100"
              >
                <div
                  class="h-40 w-40 border-2 border-cyan-500 rounded-full overflow-hidden bg-gray-200"
                >
                  <img
                    src="image/rohan.jpeg"
                    alt=""
                    class=""
                  />
                </div>
  
                <div
                  class="text-lg font-medium text-stone-600 cursor-pointer hover:text-stone-400"
                >
                  Rohan Martin
                </div>
                <div class="italic text-gray-500 text-sm">Backend</div>
                <div class="flex my-2">
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-twitter"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-instagram"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-facebook"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-linkedin"></i
                  ></a>
                </div>
              </div>
              <div
                class="flex-col px-6 py-2 shadow-xl rounded-2xl hover:scale-105 w-[90%] md:w-1/4 bg-gray-100"
              >
                <div
                  class="h-40 w-40 border-2 border-cyan-500 rounded-full overflow-hidden bg-gray-200"
                >
                  <img
                    src="image/vivek.jpeg"
                    alt=""
                    class=""
                  />
                </div>
  
                <div
                  class="text-lg font-medium text-stone-600 cursor-pointer hover:text-stone-400"
                >
                  Vivek Sasikumar
                </div>
                <div class="italic text-gray-500 text-sm">Full Stack</div>
                <div class="flex my-2">
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-twitter"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-instagram"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-facebook"></i
                  ></a>
                  <a
                    href="#"
                    class="w-9 h-9 rounded-full border-cyan-500 border text-stone-500 hover:bg-gray-500 hover:text-white mx-1 pt-1 inline-block"
                    ><i class="fa fa-linkedin"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="index.php" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-900">Home ↵</a>

</body>
</html>
