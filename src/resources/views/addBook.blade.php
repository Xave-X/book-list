<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <h1>Add book</h1>
        </div>

        <div class="newRecord">
            <div class="new">
                <span class="label label-default">New Book</span>
            </div>
            <form method="POST" action="{{ url('/addBook')}}">
                {{ csrf_field() }}
                <div class="flex form-group">
                    <label for="usr">Title:</label>
                    <input type="text" class="form-control" name="bookTitle">
                </div>
                <div class="flex form-group">
                    <label for="usr">Author:</label>
                    <input type="text" class="form-control" name="bookAuthor">
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </body>
</html>