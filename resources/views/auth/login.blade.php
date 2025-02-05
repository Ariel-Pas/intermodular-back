<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Gestion FCT</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            min-height: 100vh;
        }

        #imgLogin {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        input::placeholder {
            font-size: medium;
            font-weight: bold;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="background-color: #46B6AC">
        <div class="container">
            <div class="row g-0">
                <div class="col-7">
                    <img id="imgLogin" class="img-fluid object-fit" src="{{ asset('images/login.jpg') }}"
                        alt="Imagen Login">
                </div>
                <div class="col-5 d-flex justify-content-center align-items-center bg-white ">
                    <div class="">
                        <h4 class="text-center">Bienvenido</h4>
                        <h4 class="text-center mb-3" style="color:#ff3600"><strong>Acceder</strong></h4>
                        <form action="{{ route('apilogin') }}" method="POST">
                            @csrf
                            <div class="form-group m-2 d-flex align-items-center">
                                <i class="bi bi-person fs-4 m-2"></i><input type="text"
                                    class="border-0 border-bottom border-1" name="email" id="email"
                                    placeholder="Usuario" />
                            </div>
                            @if (!empty($msg))
                                <div class="text-danger text-center">
                                    {{ $msg }}
                                </div>
                            @endif
                            <div class="form-group m-2 d-flex align-items-center">
                                <i class="bi bi-key fs-4 m-2"></i><input type="password"
                                    class="border-0 border-bottom border-1" name="password" id="password"
                                    placeholder="Contraseña" />
                            </div>
                            <!-- AQUI HAY QUE AGREGAR UN MENSAJE SI EL PASS NO COINCIDE -->
                            <input type="submit" name="enviar" value="JOIN US"
                                class="btn btn-block w-100 text-white m-2" style="background-color: #ff3600">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


