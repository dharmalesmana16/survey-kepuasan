<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Survey Kepuasan Pelanggan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) <!-- Styles -->

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            font-size: 17px;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

        .video-background-content {
            position: relative;
            z-index: 2;
        }

        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            color: #f1f1f1;
            width: 100%;
            /* padding: 20px; */
        }



        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        .video-container {
            position: absolute;
            width: 100%;
            height: 100vh;
            overflow: hidden;

            video {
                object-fit: cover;
                width: 100vw;
                height: 100vh;
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
</head>

<body class="touchAnswer">

    <div class="video-container">
        <video autoplay muted loop poster="" id="bgvid">
            <source src="/storage/{{ $data['file_video'] }}" type="video/mp4">
        </video>

    </div>


    <div class="jumbotron content p-5 " style="visibility: hidden">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">

                <h1 class="display-6 fw-bold">Selamat datang di Perpusatakaan Daerah Nawaksara</h1>
            </div>
            <div class="col">

                <p class="lead">Alamat : Jalan Ciung Wanara No.24, Telp : (0361) 4794808</p>
                <p class="lead">Web : https://dispusarsip.gianyarkab.go.id , Email : kpadgianyar@gmail.com</p>

            </div>

            <div class="col">

                {{-- <p class="lead"> --}}
                <a href="/survey/Pelayanan" class="btn btn-danger btn-lg">
                    Kembali ke Survey</a>
                {{-- </p> --}}
            </div>

        </div>
    </div>

    <script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        $(".touchAnswer").click(function(e) {
            e.preventDefault();
            $(".content").css('visibility', 'visible');
            console.log("ada")
            setTimeout(() => {
                // $('.content').fadeOut();
                $(".content").css('visibility', "hidden");
                // location.reload()
            }, 5000);
            // $(".content").css('visibility', 'hidden');

        });

        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
    </script>

</body>

</html>
