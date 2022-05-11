<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comics</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container pt-4">
        <div class="row">
        @foreach ($data as $comic)
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ $comic['thumb'] }}">
                    <div class="card-body">
                        <h3 class="card-text">{{ $comic['title'] }}</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('comics.show', $comic) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col-12">
            {{ $data->links() }}
            </div>
        </div>
    </div>

</body>

</html>