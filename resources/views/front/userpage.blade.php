<!DOCTYPE html>
<html lang="en">
   <head>
      @include('front.layout.top')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('front.layout.header')
         <!-- end header section -->
      
         @yield('content')
         <!-- client section -->
         @include('front.layout.client_testinomial')
         <!-- end client section -->
         <!-- footer start -->
         @include('front.layout.footer')
         <!-- footer end -->
         <div class="cpy_">
            <p class="mx-auto">
               © 2023 All Rights Reserved By 
               <a href="https://facebook.com/">RgGuns</a><br>
            </p>
         </div>

         <!-- all js and jquery section here starts  -->
         @include('front.layout.bottom')
         <!-- all js and jquery section here ends  -->
      </div>
   </body>
</html>