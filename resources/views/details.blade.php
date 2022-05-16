<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comics</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <style>
        .gallery-wrap .img-big-wrap img {
            height: 450px;
            width: auto;
            display: inline-block;
            cursor: zoom-in;
        }


        .gallery-wrap .img-small-wrap .item-gallery {
            width: 60px;
            height: 60px;
            border: 1px solid #ddd;
            margin: 7px 2px;
            display: inline-block;
            overflow: hidden;
        }

        .gallery-wrap .img-small-wrap {
            text-align: center;
        }

        .gallery-wrap .img-small-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 4px;
            cursor: zoom-in;
        }
    </style>
</head>

<body>

    <div class="container pt-4">
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <div class="img-big-wrap">
                        <div> <img class="w-100" src="{{ $comic['thumb'] }}"></div>
                    </div> <!-- slider-product.// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $comic['title'] }}</h3>

                        <p class="price-detail-wrap">
                            <span class="price h3 text-success">
                                <span class="currency">$</span><span class="num">{{ $comic['price'] }}</span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd>
                                <p>{{ $comic['description'] }}</p>
                            </dd>
                        </dl>
                        <dl class="param param-feature">
                            <dt>Series</dt>
                            <dd>{{ $comic['series'] }}</dd>
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Type</dt>
                            <dd>{{ $comic['type'] }}</dd>
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Sale date</dt>
                            <dd>{{ $comic['sale_date'] }}</dd>
                        </dl> <!-- item-property-hor .// -->
                        <hr>
                        <a href="{{ route('comics.edit', $comic) }}" class="btn btn-outline-primary"> <i class="fas fa-edit"></i> Edit </a>
                        <button class="btn btn-danger confirm-button">
                            <i class="fa-solid fa-trash-can"></i> DELETE
                        </button>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

        <div class="my-overlay">
            <div class="my-modal">
                <p>Are you sure you want to delete {{ $comic['title'] }}?</p>
                <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">
                    CONFIRM
                </button>
                </form>
                <button id="close-modal" class="btn btn-outline-primary">CANCEL</button>
            </div>
        </div>
        
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>

</html>