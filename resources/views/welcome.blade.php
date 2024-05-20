<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])        <!-- Styles -->

    </head>
    <style>
        .ask{
            border: 4px solid gray;
         border-radius: 40px;
         justify-content: center !important;
        }
    </style>
<body class="d-flex flex-column vh-100">

        <x-navbar/>

    <main class="container py-5">
        <div class="d-flex justify-content-center">
            <div>
                <h3 class=" text-center ask p-4 fw-bold">
                    Bagaimana kepuasan anda terhadap pelayanan kami ?
                </h3>
            </div>
         </div>
        <form action="" method="post">
            <div class="d-flex bd-highlight justify-content-evenly">
                <?php
                    $data = [
                        ["nama"=>"Sangat Puas"
                        ,"icon"=>"5","val"=>5],
                        ["nama"=>"Puas"
                        ,"icon"=>"5","val"=>4],
                        ["nama"=>"Cukup Puas"
                        ,"icon"=>"5","val"=>3],
                        ["nama"=>"Kurang Puas"
                        ,"icon"=>"5","val"=>2],
                        ["nama"=>"Buruk"
                        ,"icon"=>"5","val"=>1],
                    ];
                    ?>
                @foreach ($data as $datas )

                <div class="bd-higlight p-3 text-center">
<input type="text" value={{ $datas["val"] }} hidden>

                        <img src="/image/5.png" alt="" srcset="" width="350">
                        <h4 class="display-6">
                            {{ $datas['nama'] }}
                        </h4>
                </div>
                @endforeach


            </div>
        </form>
    </main>
    <x-footer/>

    </body>
</html>
