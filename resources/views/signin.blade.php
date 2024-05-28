<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/login.css'])

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">

            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Pustaka Nawaraksa</h2>
                                <p>Akses Dashboard Pustaka Nawaraksa</p>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                </div>

                            </div>
                            <form action="/ceklogin" method="post" class="submitLogin">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary btnLogin px-3">Sign
                                        In</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>
<script>
    $('.submitLogin').submit(function(e) {
        e.preventDefault();


        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            data: new FormData(this),
            dataType: "json",
            beforeSend: function() {
                $('.btnLogin').attr('disable', 'disabled');
                $('.btnLogin').html('<i class="fa fa-spin fa-spinner"> </i>');
            },
            complete: function() {
                $('.btnLogin').removeAttr('disable');
                $('.btnLogin').html('Submit');
            },
            success: function(response) {
                // console.log(response)
                if (response.status == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: response["msg"],
                        showConfirmButton: false
                    });
                    setTimeout(() => {

                        window.location.href = '/dashboard'
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: "Password atau username anda salah !",
                        showConfirmButton: false
                    });
                }
            }
        });
    });
</script>

</html>
