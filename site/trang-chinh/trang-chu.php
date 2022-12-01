<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDK Store</title>
</head>

<body>
    <div class="slider">
        <div class="slider-img">
            <img src="https://coffeeluck.themerex.net/wp-content/uploads/2016/08/slide1.jpg" alt="">
        </div>
        <div class="slider-content">
            <h3><span class="typing">Coffee with our story</span></h3>
            <p>visit our the best coffee shop</p>
        </div>
    </div>
    <div class="content">
        <section class="favourite">
            <div class="row">
                <h3 class="title">Popular</h3>
            </div>
            <div class="row">
                <?php
                require '../layout/top10.php';
                ?>
            </div>

        </section>
        <section class="testim">
            <div class="title">
                Testimonial
            </div>
            <div class="testim-wrap">
                <div class="testim-left">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="testim-content">

                </div>
                <ul class="testim-dots">
                    <li class="dot active"></li>
                    <li class="dot"></li>
                    <li class="dot"></li>
                    <li class="dot"></li>
                    <!-- <li class="dot"></li>
                <li class="dot"></li> -->
                </ul>
                <div class="testim-right">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </section>
    </div>
</body>

</html>