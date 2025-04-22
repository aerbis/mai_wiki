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
                @foreach ($users as $user)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>{{ $loop->index + 1 }}. </span>{{ $user->name }}</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">  
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                @if (!is_null($user->role) && $user->role == 'reader')
                                <form action="" class="btn btn-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio11" autocomplete="off" checked>
                                    <label for="btnradio11">Читатель</label>
                                </form>
                                @else
                                <form action="" class="btn btn-outline-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio11" autocomplete="off" checked>
                                    <label for="btnradio11">Читатель</label>
                                </form>
                                @endif
                            
                                @if (!is_null($user->role) && $user->role == 'writer')
                                <form action="" class="btn btn-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio21" autocomplete="off">
                                    <label for="btnradio21">Редактор</label>
                                </form>
                                @else
                                <form action="" class="btn btn-outline-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio21" autocomplete="off">
                                    <label for="btnradio21">Редактор</label>
                                </form>
                                @endif
                            
                                @if (!is_null($user->role) && $user->role == 'admin')
                                <form action="" class="btn btn-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio31" autocomplete="off">
                                    <label for="btnradio31">Админ</label>
                                </form>
                                @else
                                <form action="" class="btn btn-outline-light" style="display: inline;">
                                    <input type="submit" class="btn-check" name="btnradio" id="btnradio31" autocomplete="off">
                                    <label for="btnradio31">Админ</label>
                                </form>
                                @endif
                            </div>    
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="" style="display: inline;">
                                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
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