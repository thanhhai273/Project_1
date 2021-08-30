<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkET</title>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/linkicon.svg') }}">
</head>

<body>
    <section class="animated-background">
        <div id="stars1"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </section>
    <a id="profilePicture">
        @if(file_exists(public_path("img/$user->page" . ".png" )))
          <img src="{{ asset("img/$user->page" . ".png") }}"  width="100px" height="100px">
        @else
          <img src="{{ asset('assets/linkicon.svg') }}" width="100px" height="100px">
        @endif
    </a>
    <div id="userName">
        <!-- Your Name -->
        <h1>{{ $user->page }}</h1>
        <!-- Short Bio -->
        <p>{{ $user->description }}</p>
    </div>

    <div id="links">
        @foreach($user->links as $link)
                <a
                    class="link"
                    href="{{ route('clickNumber') . '/' . $link->id . '/' . $link->link}}"
                    target="_blank"
                    rel="nofollow"
                    data-link-id="{{ $link->id }}"
                >{{ $link->title }}</a>
            
        @endforeach
    </div>

</body>

</html>