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
<body>
    <x-navbar/>

    <div class="container-fluid h-100">
      <div class="row h-100 overflow-auto">
        <div class="col-lg-9 order-lg-1 mt-3">
          <div class="row">
            <div class="col-lg-9 col-sm-12">
                <h3>Домашняя страница</h3>
            </div>
            <div class="col-lg-3 col-sm-12 text-end">
                @if(Auth::check())
                <form action="/page" method="POST" style="margin: 0; padding: 0; display: inline;">
                  @csrf
                  <input type="text" hidden name="title" value="Название статьи">
                  <input type="text" hidden name="text" value="Текст статьи">
                  <input type="text" hidden name="parent_id" value="{{ null }}">
                  <button class="btn btn-outline-dark" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
                  </button>
                </form>
                <button class="btn btn-outline-dark" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                    </svg>
                </button>
                @endif
            </div>
            </div>
                <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-2">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="link-success">Home</a></li>
                    </ol>
                </nav> -->
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                @if (!Auth::check())
                  <div class="alert alert-light mt-3" role="alert">
                    <a class="link-success" href="/register">Зарегистрируйтесь</a> или <a class="link-success" href="/login">войдите</a>, чтобы создавать и редактировать статьи
                  </div>
                @endif
            </div>

            <x-navigation-tree :rootpages="$rootpages" :currentpageid="$currentpageid"/>
          </div>  


          <!-- <h3>Список статей</h3>
            <ol class="list-group list-group-numbered">
              @foreach ($pages as $page)
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <a href="/page/{{ $page->id }}">{{ $page->title }}</a>
                </div>
                @if (Auth::check())
                  <form action="/page/{{ $page->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить" class="btn btn-danger">
                  </form>
                @endif
              </li>
              @endforeach
            </ol> 

            @include('navigation.page-list', ['pages' => $rootpages])

            @if (Auth::check())
              <div class="d-flex flex-row-reverse mt-3">
                <a href="/page/create" type="button" class="btn btn-primary">Создать новую статью</a>
              </div>
            @else
              <div class="alert alert-light mt-3" role="alert">
                <a href="/register">Зарегистрируйтесь</a> или <a href="/login">войдите</a>, чтобы создавать и редактировать статьи
              </div>
            @endif -->
          </div>
      </div> 
    </div>

    <x-footer/>

    <style>
        html, body {
            height: 89%;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>