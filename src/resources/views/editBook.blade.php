<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <h1>Edit book</h1>
        </div>

        <div class="newRecord">
            <div class="new">
                <span class="label label-default">Edit Book</span>
                @foreach ($book as $theBook)
                    <p>Title: {{ $theBook->Title }}</p>
                    <p>Author: {{ $theBook->Author }}</p>

            </div>
            <form method="POST" action="{{ url('/editBook')}}">
                {{ csrf_field() }}
                <div class="flex form-group">
                    <label for="usr">Update author:</label>
                    <input type="text" class="form-control" name="bookAuthor">
                </div>
                <input type="hidden" id="bookId" name="bookId" value="{{ $theBook->id }}">
                @endforeach
                </br>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </body>
</html>