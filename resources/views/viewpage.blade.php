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

    <!-- Medium.js install -->
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet"/>

    <style>
        .medium-toolbar-arrow-under:after {
        border-color: #242424 transparent transparent transparent;
        top: 50px; }

        .medium-toolbar-arrow-over:before {
        border-color: transparent transparent #242424 transparent;
        top: -8px; }

        .medium-editor-toolbar {
        background-color: #242424;
        background: -webkit-linear-gradient(top, #242424, rgba(36, 36, 36, 0.75));
        background: linear-gradient(to bottom, #242424, rgba(36, 36, 36, 0.75));
        border: 1px solid #000;
        border-radius: 5px;
        box-shadow: 0 0 3px #000; }
        .medium-editor-toolbar li button {
            background-color: #242424;
            background: -webkit-linear-gradient(top, #242424, rgba(36, 36, 36, 0.89));
            background: linear-gradient(to bottom, #242424, rgba(36, 36, 36, 0.89));
            border: 0;
            border-right: 1px solid #000;
            border-left: 1px solid #333;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
            color: #fff;
            height: 50px;
            min-width: 50px;
            -webkit-transition: background-color .2s ease-in;
                    transition: background-color .2s ease-in; }
            .medium-editor-toolbar li button:hover {
            background-color: #000;
            color: yellow; }
        .medium-editor-toolbar li .medium-editor-button-first {
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px; }
        .medium-editor-toolbar li .medium-editor-button-last {
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px; }
        .medium-editor-toolbar li .medium-editor-button-active {
            background-color: #000;
            background: -webkit-linear-gradient(top, #242424, rgba(0, 0, 0, 0.89));
            background: linear-gradient(to bottom, #242424, rgba(0, 0, 0, 0.89));
            color: #fff; }

        .medium-editor-toolbar-form {
        background: #242424;
        border-radius: 5px;
        color: #999; }
        .medium-editor-toolbar-form .medium-editor-toolbar-input {
            background: #242424;
            box-sizing: border-box;
            color: #ccc;
            height: 50px; }
        .medium-editor-toolbar-form a {
            color: #fff; }

        .medium-editor-toolbar-anchor-preview {
        background: #242424;
        border-radius: 5px;
        color: #fff; }

        .medium-editor-placeholder:after {
        color: #b3b3b1; }
    </style>
</head>
<body class="bg-dark">
    <x-navbar/>

    <div class="container-fluid h-100">
        <div class="row h-100 overflow-auto">
            <div class="col-lg-9 order-lg-1 mt-3">
                <form id="editlayout" method="POST" action="/page/{{ $page->id }}" style="display: none;">
                @csrf
                @method('PUT')
                <div class="row mb-2">
                    <div class="col-lg-10 col-sm-12 mb-2">
                        <input class="form-control" type="text" placeholder="Введите текст" name="title" value="{{ $page->title }}" style="font-weight: bold; font-size: large;" aria-label=".form-control-lg example">
                    </div>
                    <div class="col-lg-2 col-sm-12 text-end">
                        <button class="btn btn-outline-light" onclick="setView()" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                            </svg>
                        </button>
                        <button class="btn btn-outline-light" onclick="getText()" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                <path d="M11 2H9v3h2z"/>
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <input id="text" hidden type="text" class="form-control" name="text" value="{{ $page->text }}">
                </form>

                <div id="viewlayout" class="row mb-2" style="display: flex;">
                    <div class="col-lg-10 col-sm-12 mb-2">
                        <h3 class="text-white">{{ $page->title }}</h3>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-end">
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'writer')
                        <form action="/page/{{ $page->id }}" method="POST" style="margin: 0; padding: 0; display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-light" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </form>
                        <form action="/page" method="POST" style="margin: 0; padding: 0; display: inline;">
                            @csrf
                            <input type="text" hidden name="title" value="Название статьи">
                            <input type="text" hidden name="text" value="Текст статьи">
                            <input type="text" hidden name="parent_id" value="{{ $page->id }}">
                            <button class="btn btn-outline-light" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </button>
                        </form>
                        <button class="btn btn-outline-light" onclick="setEdit()" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                            </svg>
                        </button>
                        @endif
                    </div>
                </div>

                <!-- <div class="row">
                  <h5 class="ms-3">Теги: <span class="badge text-bg-success">Тег</span></h5>
                </div> -->

                <div class="row">
                    <div class="col-lg-10">
                        <div id="view_text" class="card text-white" style="backdrop-filter: blur(5px); background-color: rgb(0 0 0 / 50%); padding: 10px">
                            {!! $page->text !!}
                        </div>
                        <textarea id="sample">{{ $page->text }}</textarea>
                    </div>
                </div>
                
            </div>

            <x-navigation-tree :rootpages="$rootpages" :currentpageid="$page->id"/>
        </div>
    </div>

    <x-footer/>

    <!-- Suneditor install -->
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <!-- languages (Basic Language: English/en) -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ru.js"></script>


    @if (Auth::check())
    <script>
        const text = document.getElementById('text')
        const editlayout = document.getElementById('editlayout')
        const viewlayout = document.getElementById('viewlayout')

        const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
            width: 'auto',
            height: 'auto',
            buttonList : [
                ['undo', 'redo'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'align', 'list', 'link', 'image', 'table', 'print'],
            ],
            lang: SUNEDITOR_LANG['ru']
        })
        editor.readOnly(true)
        editor.toolbar.hide()

        editor.setContents(text.value)
        document.getElementById('suneditor_sample').style.display = 'none';

        function getText() {
            text.value = editor.getContents()
        }

        function setEdit() {
            editlayout.style.display = 'block';
            viewlayout.style.display = 'none';

            editor.readOnly(false)
            editor.toolbar.show()
            document.getElementById('suneditor_sample').style.display = 'block';
            document.getElementById('view_text').style.display = 'none';
        }

        function setView() {
            editlayout.style.display = 'none';
            viewlayout.style.display = 'flex';

            editor.readOnly(true)
            editor.toolbar.hide()
            document.getElementById('suneditor_sample').style.display = 'none';
            document.getElementById('view_text').style.display = 'block';
        }
    </script>    
    @else
    <script>
        const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
            width: 'auto',
            height: 'auto',
            lang: SUNEDITOR_LANG['ru']
        })

        editor.readOnly(true)
        editor.toolbar.hide()
    </script>
    @endif
    
    <style>
        html, body {
            height: 90%;
        }
        ::-webkit-scrollbar {
            display: none;
        }
        img {
            width: 850px;
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>