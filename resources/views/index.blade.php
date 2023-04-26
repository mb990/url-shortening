@extends('layouts.app')

@section('title', 'Short your URLs')

@section('heading', 'Shorten your URL')

@section('content')

    <div id="js-errors">

    </div>

    <div class="form-group js-url-form">
        <label>URL</label>
        <input id="js-url" name="url"/>
    </div>

    <div class="form-group">
        <button id='js-create-url'>Create shorter URL</button>
    </div>

    <script>
        $(document).ready(function () {

            $('#js-create-url').click(function (e) {

                e.preventDefault();

                let url = $('#js-url').val();

                $.ajax({
                    url: {!! json_encode(route('url.store')) !!},
                    type: 'POST',
                    data: {
                        original: url
                    },
                    success: function (data) {
                        alert(data.success);
                    },
                    error: function (data) {
                        let message = data.responseJSON.message.replace('original', 'url');
                        $('#js-errors').empty().append('<p>' + message + '</p>');
                    }

                }).done(function () {
                    //
                });
            })
        })
    </script>

@endsection
