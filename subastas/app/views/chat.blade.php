<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script src="{{asset('js/libs/handlebars-1.1.2.js')}}"></script>
    <script src="{{asset('js/libs/ember-1.4.0.js')}}"></script>
    <script src="{{asset('js/ember.data.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>


    <title>Laravel 4 Chat</title>
</head>
<body>
<script type="text/x-handlebars">
            @{{outlet}}
        </script>
<script
    type="text/x-handlebars"
    id="chat"
    >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Laravel 4 Chat</h1>
                        <table class="table table-striped">
                            @{{#each}}
                                <tr>
                                    <td>
                                        @{{user}}
                                    </td>
                                    <td>
                                        @{{text}}
                                    </td>
                                </tr>
                            @{{/each}}
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                            />
                            <span class="input-group-btn">
                                <button class="btn btn-default">
                                    Send
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </script>

</body>
</html>