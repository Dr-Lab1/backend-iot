<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="m-3">

    <main class="container">
        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <form action="{{ route('humidite') }}">

                                <div class="row m-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Humidite</button>
                                    </div>
                                </div>

                            </form>

                            <form action="{{ route('temperature') }}">

                                <div class="row m-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Temperature</button>
                                    </div>
                                </div>

                            </form>

                            <form action="{{ route('pollution') }}">

                                <div class="row m-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Pollution</button>
                                    </div>
                                </div>

                            </form>

                            <form action="{{ route('lumiere') }}">

                                <div class="row m-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Lumiere</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    
</body>

</html>
