<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/bootstrap.min.css', 'resources/js/bootstrap.js'])
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @endif
</head>
<body class="bg-black">
    <x-navbar/>
    <div class="container-fluid h-100 text-white">
        <div class="container mt-3">
            <h2>Список пользователей</h2>
            <ul class="card text-white" style="backdrop-filter: blur(5px); background-color: rgb(0 0 0 / 50%); padding: 10px">
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>1. </span>Михаил Михайлович Мизайлов-Михайловко</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio11" autocomplete="off" checked>
                                    <label class="btn btn-outline-light" for="btnradio11">Читатель</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio21" autocomplete="off">
                                    <label class="btn btn-outline-light" for="btnradio21">Редактор</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio31" autocomplete="off">
                                    <label class="btn btn-outline-light" for="btnradio31">Админ</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>2. </span>Михаил Михайлович Мизайлов-Михайловко</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio12" autocomplete="off" checked>
                                    <label class="btn btn btn-outline-light" for="btnradio12">Читатель</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio22" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio22">Редактор</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio32" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio32">Админ</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>3. </span>Михаил Михайлович Мизайлов-Михайловко</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio13" autocomplete="off" checked>
                                    <label class="btn btn btn-outline-light" for="btnradio13">Читатель</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio23" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio23">Редактор</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio33" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio33">Админ</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>4. </span>Михаил Михайлович Мизайлов-Михайловко</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio14" autocomplete="off" checked>
                                    <label class="btn btn btn-outline-light" for="btnradio14">Читатель</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio24" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio24">Редактор</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio34" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio4">Админ</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>5. </span>Михаил Михайлович Мизайлов-Михайловко</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio15" autocomplete="off" checked>
                                    <label class="btn btn btn-outline-light" for="btnradio15">Читатель</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio25" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio25">Редактор</label>
                                
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio35" autocomplete="off">
                                    <label class="btn btn btn-outline-light" for="btnradio35">Админ</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <x-footer/>

</body>
<style>
        html, body {
            height: 89%;
        }
        ::-webkit-scrollbar {
            display: none;
        }
</style>
<style> 
        body {
            background-image: url('https://avatars.mds.yandex.net/get-mpic/4407413/img_id3120010206446289579.jpeg/orig');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0;   
        }
</style>
</html>