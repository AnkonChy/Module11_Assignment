<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your App Title</title>
    <!-- Additional stylesheets, scripts, or meta tags can be included here -->
</head>
<body>
    @include('components.navbar')

    <nav>
        <!-- Your navigation bar content goes here -->
    </nav>

    <div class="container">
        <!-- Content section where specific views will be included -->
        @yield('content')
    </div>

    @include('components.footer') 

    <!-- Additional scripts or footer content can go here -->

</body>
</html>
