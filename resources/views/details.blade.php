@extends('layouts.app')

@section('title', 'Your private URL dashboard')

@section('heading', 'Dashboard')

@section('content')

    <div id="js-errors">

    </div>

    <div class="form-group">
        <label>Your original URL</label>
        {{ $url->original }}
    </div>

    <div class="form-group">
        <label>Your short URL</label>
        <a href="{{ $url->original }}" id="js-short-url">
            {{ $url->short }}
        </a>
    </div>


    <h2>Stats</h2>
    <div class="details">
        <div class="card">
            <div class="title">Total visits</div>
            <div id="js-url-total-visits" class="value">{{ $url->total_visits }}</div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#js-short-url').click(function (e) {

                e.preventDefault();

                let total_visits = 1;

                $.ajax({
                    url: {!! json_encode(route('url.update', $url)) !!},
                    type: 'PUT',
                    data: {
                        total_visits: total_visits
                    },
                    success: function (data) {
                        alert(data.success);
                        $('#js-url-total-visits').html(data.url.total_visits);
                    },
                    error: function (data) {
                        let div = $('#js-errors');
                        let message = data.responseJSON.message;
                        div.empty().append('<p>' + message + '</p>');
                    }

                }).done(function (data) {
                    let url_to_open = data.url.original;
                    window.open(url_to_open, "_blank");
                });
            })
        })
    </script>
@endsection
