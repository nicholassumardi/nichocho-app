<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Will You Be My Valentine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        .fadeContent {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
        }

        .yes-btn {
            font-size: 20px;
            padding: 10px 20px;
            width: 150px;
            transition: all 0.3s ease-in-out;
        }

        .no-btn {
            font-size: 20px;
            padding: 10px 20px;
            width: 150px;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body background="{{ asset('val/bg.gif') }}" class="d-flex justify-content-center align-items-center vh-100">
    <div id="fadeContent" class="fadeContent text-center">
        <p class="fs-1 text-white fw-bold">Hello, my dearest Yolanda Agustin ❤️</p>
    </div>

    <div class="container text-center d-none" id="mainContent">
        <div class="row">
            <div class="col">
                <p class="fs-1 fw-bold text-white mb-3" id="mainTitle">Will you be my Valentine? </p>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img id="mainImage" src="{{ asset('val/bg1.jpg') }}" class="img-fluid" alt="Valentine's Image"
                    style="max-width: 300px;">
            </div>
        </div>
        <div class="d-flex justify-content-center gap-2 mt-4 flex-wrap" id="mainButton">
            <div class="d-inline-block">
                <button type="button" class="btn btn-success yes-btn" id="btnYes">Yes</button>
            </div>
            <div class="d-inline-block">
                <button type="button" class="btn btn-danger no-btn" id="btnNo">No!</button>
            </div>
        </div>

        <!-- Footer -->
        <footer class="position-fixed bottom-0 end-0 p-3 text-white text-end w-100">
            <p class="mb-0">Made with ❤️ by Nichocho</p>
        </footer>

        <div id="musicContainer"></div>
    </div>
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    $(document).ready(function() {
        $("#fadeContent").delay(500).fadeOut(3000, function() {
            $(this).remove(); // Removes the element after fade-out
            $("#mainContent").removeClass('d-none').hide().fadeIn(2000);
        });
    });
    let clickCount = 0;

    $('#btnNo').click(function (e) { 
        clickCount++;

        let newSize = 50 + clickCount * 20; // Increase size by 20px per click
        $("#btnYes").css({
            'display': 'inline-block',
            'font-size': `${newSize}px`,
            'padding': `${clickCount * 5}px ${clickCount * 10}px`,
            'width': `${150 + newSize}px`
        });

        if (clickCount == 1) {
            $('#musicContainer').html(`
              <audio autoplay loop>
                    <source src="{{ asset('val/sad.m4a') }}" type="audio/mpeg">
                </audio>
            `);
            $("#mainTitle").html('Please ce ?');
            $("#mainImage").attr("src", "{{ asset('val/cdih.gif') }}");
        }
        if (clickCount == 2) {
            $("#mainTitle").html('Kenapa gamau ce 😭 ?');
            $("#mainImage").attr("src", "{{ asset('val/cdih2.jpg') }}");
        }
        if (clickCount == 3) {
            $("#mainTitle").html('ce ? 🥺🥺🥺');
            $("#mainImage").attr("src", "{{ asset('val/cdih3.jpg') }}");
        }
        if (clickCount == 4) {
            $("#mainTitle").html('serius gamau 😢 ?');
            $("#mainImage").attr("src", "{{ asset('val/cdih4.gif') }}");
        }

        if (clickCount >= 5) {
            $("#btnYes").css({
                'display': 'block',
                'position': 'fixed',
                'top': '0',
                'left': '0',
                'width': '100vw',
                'height': '100vh',
                'font-size': '50px',
                'z-index': '1000',
            });
        }

    });

    $('#btnYes').click(function (e) { 
        $('#musicContainer').html(``);

        $('#musicContainer').html(`
        <audio autoplay loop>
            <source src="{{ asset('val/happy.m4a') }}" type="audio/mpeg">
        </audio>
        `);
        $(this).removeAttr("style");
        $("#mainButton").addClass('d-none');
        $("#mainTitle").html('Yeay ❤️❤️❤️');
        $("#mainImage").attr("src", "{{ asset('val/yes.jpeg') }}");
    });

</script>

</html>