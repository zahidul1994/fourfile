<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email</title>
    <script src="https://kit.fontawesome.com/c981507240.js" crossorigin="anonymous"></script>
    <style>
        body {
            padding: 10px 0 30px 0;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }

        .main-content {
            width: 600px;
            margin: auto;
            border: 1px solid #ddd;

        }

        .header-area {
            padding: 30px;
            text-align: center;
            background-color: #70bbd9
        }

        .email-content {
            padding: 40px 20px;
        }

        .email-content h3 {
            margin: 0;
            padding-bottom: 20px;
            font-weight: 700;
            color: #222;
            font-size: 22px;
        }

        .email-content p {
            color: #222;
            font-size: 16px;
            margin: 0;
            line-height: 16px;
            line-height: 24px;
        }

        .email-footer {
            padding: 35px 20px;
            background-color: #ee4c50;
            color: #fff;
            display: flex;
        }

        .copyright {
            width: 50%;
            align-self: center;
        }

        .copyright a {
            color: #fff;
        }

        .email-social-icon {
            width: 50%;
            text-align: right;
            align-self: center;
        }

        .email-social-icon ul {
            margin: 0;
        }

        .email-social-icon ul li {
            list-style: none;
            display: inline-block;
            padding: 0 4px;
        }

        .email-social-icon ul li a {
            color: #fff;
            font-size: 22px;
        }


        /*        responsive start here*/

        @media (max-width: 575px) {
            body{
                padding: 0;
                margin: 0;
            }
            .main-content{
                width: 100%;
            }
            .email-footer{
                padding: 20px;
            }
            .email-social-icon ul li a{
                font-size: 18px;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            body{
                padding: 0;
                margin: 0;
            }
            .main-content{
                width: 100%;
            }
            .email-footer{
                padding: 20px;
            }
            .email-social-icon ul li a{
                font-size: 18px;
            }
        }

     
    </style>
</head>

<body>

    <div class="main-content">
        <div class="header-area">
            <span class="email-icon" style="margin-bottom: 20px; color: #fff; font-size: 45px; display: block;">
                <i class="far fa-envelope-open"></i>
            </span>
            <img  src="{{@asset('storage/app/files/shares/profileimage/'.Auth::user()->image)}}" alt="">
        </div>
        <div class="email-content">
            <h3>
                Hello Zaihd <span>,</span>
            </h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate ex, aperiam harum maiores neque sapiente. Explicabo quos delectus commodi, saepe inventore qui sequi ullam quasi veniam alias, numquam voluptatem, optio nulla vero eum beatae consectetur tempora eligendi cumque aliquid reiciendis, vitae enim. Reprehenderit unde asperiores, fuga hic. Aliquam laboriosam, aut.
            </p>
            <p style="padding-top: 12px;">
                <b>Thank You</b>
            </p>
        </div>

        <div class="email-footer">
            <div class="copyright">&copy; <a href="#">Virtuanic</a></div>
            <div class="email-social-icon">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
