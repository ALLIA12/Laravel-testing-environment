<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#242424",
                    },
                },
            },
        };
    </script>
</head>

@component('mail::message')
    <p>
        For user: {{ $user->name }}
        And ID: {{ $user->id }}
        If you wish to verifiy click:
    </p>
    @php
    $url = 'http://127.0.0.1:8000/users/' . $user->id . '/acceptDean';
    @endphp
    @component('mail::button', ['url' => $url])
        Make Admin
    @endcomponent
    <p class="uppercase ">            or:
    </p>
    @php
    $url = 'http://127.0.0.1:8000/users/' . $user->id . '/denyDean';
    @endphp
    @component('mail::button', ['url' => $url])
        Deny Admin
    @endcomponent

    Our regards,
    
    {{ config('app.name') }}
@endcomponent
