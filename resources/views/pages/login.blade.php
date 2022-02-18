<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- bootstrap CSS connect --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/login.css">

        <title>Petrol ms Login</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <section class="login_area py-4 px-5">
                        <img src="./images/logo.png" alt="" class="img-fluid mx-auto d-block" width="30%">
                        <h6 class="text-uppercase text-center" style="margin-bottom: 10%;">petrolum managment system
                        </h6>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Id:" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                            {{-- Later on --}}
                            <a href="/" class="form-control btn my-4">LOGIN</a>
                        </form>
                        {{-- Later on --}}
                        <p class="text-danger" hidden>Error message will be shown here</p>
                    </section>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    </body>

</html>