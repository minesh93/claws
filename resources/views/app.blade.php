<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App</title>

        <!-- Fonts -->


        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/test.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <div id="app">
            <app-header></app-header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 user-sidebar">
                        <user-sidebar></user-sidebar>
                    </div>   
                    <div class="col-md-10 col-md-offset-2">
                        <router-view></router-view>
                    </div> 
                </div>
            </div>
            
        </div>

        <!-- Scripts N Ting -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                'pusherKey' => env('PUSHER_APP_KEY'),
            ]); ?>
        </script>
        <script type="text/javascript" src="/js/app.js"></script>

    </body>
</html>
