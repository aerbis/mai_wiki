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
<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Personal KB</a>
      </div>
    </nav>

    <div class="container mt-3">
        <form method="POST" action="/page">
            @csrf
            <input type="text" class="form-control" name="title" value="Название статьи">
            <br>
            <!-- <div class="editable" style="height: 400dp;"></div> -->

            <!-- Create the editor container -->
            {{-- <div id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </div> --}}

            <textarea id="sample">Текст статьи</textarea>

            <input id="text" type="text" hidden class="form-control" name="text" value="Текст статьи">
            <div class="d-flex flex-row-reverse mt-3">
                <input type="submit" onclick="getText()" value="Сохранить" class="btn btn-danger">
            </div>
        </form>
    </div>

    <!-- Suneditor install -->
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <!-- languages (Basic Language: English/en) -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ru.js"></script>

    <script>
        const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
            width: 'auto',
            height: 'auto',
            buttonList : [
                ['undo', 'redo'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'align', 'list', 'link', 'image', 'table'],
            ],
            lang: SUNEDITOR_LANG['ru']
        })

        const text = document.getElementById('text')

        editor.setContents(text.value)

        function getText() {
            text.value = editor.getContents()
        }
    </script>

    {{-- <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],  
            
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }], 

            [{ 'color': [] }, { 'background': [] }],

            [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
            [{ 'align': [] }],

            ['blockquote', 'code-block'],
            ['link', 'image', 'video', 'formula'],
        ]

        const quill = new Quill("#editor", {
            modules: {
                toolbar: toolbarOptions
            },
            theme: "snow",
        });

        const text = document.getElementById('text')

        quill.setContents(JSON.parse(text.value))

        function getText() {
            text.value = JSON.stringify(quill.getContents())
        }
    </script> --}}
    

    <!-- <script>
        var editor = new MediumEditor('.editable')
        var text = document.getElementById('text')

        editor.setContent(text.value)

        function getText() {
            text.value = editor.getContent()
        }
    </script> -->
</body>
</html>