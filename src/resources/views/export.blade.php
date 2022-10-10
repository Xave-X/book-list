<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <h1>Export</h1>
        </div>
        <h3>CSV</h3>
        <a href="{{action('BooksController@exportCSVTA')}}">Titles and authors</a></br>
        <a href="{{action('BooksController@exportCSVTitles')}}">Titles only</a></br>
        <a href="{{action('BooksController@exportCSVAuthors')}}">Authors only</a></br></br>

        <h3>XML</h3>
        <a href="{{action('BooksController@exportXMLTA')}}">Titles and authors</a></br>
        <a href="{{action('BooksController@exportXMLTitles')}}">Titles only</a></br>
        <a href="{{action('BooksController@exportXMLAuthors')}}">Authors only</a></br>
    </body>
</html>