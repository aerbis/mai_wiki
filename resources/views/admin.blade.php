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
                @if($user->id != 1)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 mb-2 mt-2"><span>{{ $loop->index }}. </span>{{ $user->name }}</div>
                        <div class="col-lg-5 col-sm-12 mb-2 mt-2 text-end">  
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                @if (!is_null($user->role) && $user->role == 'reader')
                                <form action="" style="display: inline;">
                                    <button type="submit" class="btn btn-light me-1">Читатель</button>
                                </form>
                                @else
                                <form action="/role/reader/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-light me-1">Читатель</button>
                                </form>
                                @endif
                            
                                @if (!is_null($user->role) && $user->role == 'writer')
                                <form action="" style="display: inline;">
                                    <button type="submit" class="btn btn-light me-1">Редактор</button>
                                </form>
                                @else
                                <form action="/role/writer/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-light me-1">Редактор</button>
                                </form>
                                @endif
                            
                                @if (!is_null($user->role) && $user->role == 'admin')
                                <form action="" style="display: inline;">
                                    <button type="submit" class="btn btn-light me-1">Админ</button>
                                </form>
                                @else
                                <form action="/role/adminrole/{{ $user->id }}" method="POST" style="display: inline;">
                                @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-light me-1">Админ</button>
                                </form>
                                @endif
                            </div>    
                        </div>
                        <div class="col-lg-1 col-sm-12 mb-2 mt-2 text-end">
                            <form action="/user/{{ $user->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endif
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
            background-image: url('/images/background_image.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0;   
        }
</style>
</html>