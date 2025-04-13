<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="/images/logo.png" type="image/png">




    <style>
        html,
        body {
            margin: 0;
            padding: 0px;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            font-family: 'Roboto';

        }

        * {
            margin: 0;
            padding: 0
        }

        .Maincontainer {
            flex: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;




        }

        footer {
            background-color: #1C1C1C;
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            padding: 20px;

        }

        .firstFoot {
            display: flex;
            flex-wrap: wrap;
            /* Allows items to wrap on smaller screens */
            padding: 30px;
            justify-content: center;
            align-items: center;
            margin: auto;
            gap: 250px;


        }

        .firstFoot>div {
            flex: 1;
            min-width: 300px;
            /* Ensures proper stacking on smaller screens */
        }

        .firstFoot h2 {
            font-family: Roboto, sans-serif;
            font-size: 2rem;
            /* Responsive font size */
            color: #DD9323;
        }

        .firstFoot p {
            color: white;
            font-size: 1.2rem;
            max-width: 80%;
            font-family: Roboto, sans-serif;
        }

        .firstFoot img {
            max-width: 100%;
            /* Ensures the image scales */
            height: auto;
        }

        .secondFoot {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .secondFoot h4 {
            font-family: Roboto, sans-serif;
            font-size: 1.5rem;
            color: white;
        }
        @media(max-width:989px){
            .firstFoot{
                gap: 80px;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .firstFoot {
                flex-direction: column;
                text-align: center;
                align-items: center;
                gap: 40px;
            }

            .firstFoot>div {
                width: 100%;
                text-align: center;
            }

            .firstFoot h2 {
                font-size: 1.8rem;
            }

            .firstFoot p {
                font-size: 1rem;
                max-width: 100%;
            }

            .secondFoot h4 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    @include('Users.nav')
    <div class="Maincontainer">
        @yield('content')
    </div>
    <footer>
        <div class="firstFoot">
            <div style="display: flex; flex-direction:column; gap:20px; ">
                <h2>BEST SERVICE TOURS</h2>
                <p>Enjoy a hassle-free, private airport transfer from Marrakech Airport
                    (RAK) straight to your
                    hotel or Riad.
                </p>
                <p>
                    Avoid the complicated public transportation networks
                    and save yourself the time of tracking down a taxi.
                </p>
            </div>
            <div>
                <img src="/images/bank.png" alt="" width="300px">
            </div>
        </div>
        <hr>
        <div class="secondFoot">
            <h4>© 2025 Best Service Tours | All Rights Reserved </h4>
        </div>
    </footer>

</body>

</html>
