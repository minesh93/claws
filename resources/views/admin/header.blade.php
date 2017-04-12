<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Claws Admin</title>
    <!-- Fonts -->


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/admin/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.quilljs.com/1.2.3/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/css/app.css">
</head>
<body>

@yield('content')

<!-- Scripts N Ting -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="/admin/js/index.js"></script>
</body>
</html>
