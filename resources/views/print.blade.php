<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <title>Document</title>
    @vite(['resources/sass/app.scss']) <!-- Styles -->
</head>
<body>
    <div class="text-center">
        <p class="fw-light fs-6">Pemerintah Kabupaten Gianyar</p>
    </div>
</body>
<script>
$(document).ready(function () {
    window.print();
});
</script>
</html>