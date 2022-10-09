<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <h1>Book list</h1>
        </div>

        <div class="table-wrapper-scroll-y">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody>
                @php ($i=1)
                @foreach ($books as $book)
                    <tr class="satir">
                        <th scope="row">{{$i}}</th>
                        <td>{{ $book->Title }}</td>
                        <td>{{ $book->Author }}</td>
                        
                        <td><a href="{{action('BooksController@deleteBook', ['id' => $book -> id])}}">Delete</a></td>
                        <!--In the construction above, ['id' => $book -> id], the $book -> id part
                        is getting the id attribute from the $book array. Whatever that id value
                        is, the 'id' => part takes whatever that value is and puts it in 'id'.
                        Then, 'id' is passed to the controller. In the controller, look at the 
                        $id = $request->id; line. In that line, the id before the ; is the 'id'
                        bit in the construction above. -->
                        <td>{{ $book->genreName }}</td>
                        <td>{{ $book->numOfPages }}</td>
                    </tr>
                    @php ($i= $i + 1)
                @endforeach
                </tbody>
            </table>
            <br/>
        </div>








    </body>
</html>
