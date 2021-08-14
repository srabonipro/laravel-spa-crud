<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Testing PDF</title>

    <style></style>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Created_at</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $book->name }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ $book->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
