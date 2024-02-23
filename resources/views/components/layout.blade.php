         <!DOCTYPE html>
         <html lang="en">

         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <link href="{{ asset('css/style.css') }}" rel="stylesheet">
             <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700&display=swap">
             <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
             <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">


             @vite(['public/css/app.css', 'public/js/app.js'])

             <title>The Aulab Post</title>
         </head>

         <body>
             <x-navbar />

             <div class="min-vh-100">
                 {{ $slot }}
             </div>

             <x-footer />

             <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
             <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
         </body>

         </html>
