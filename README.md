![Inroute](https://raw.githubusercontent.com/inroutephp/inroute/master/res/logo.png "Inroute")

# example-app

Inroute example application.

## Getting started

1. Clone this repository
1. Install dependencies using `composer install`
1. Examine the router using `vendor/bin/inroute debug`
1. When needed rebuild the router using `vendor/bin/inroute build`
1. Start a local server using `php -S localhost:8000 public/app.php`
1. Point you browser to `http://localhost:8000`

## TODO

Vad vill jag att den här appen ska kunna göra?

* Route där en måste logga in, setup med custom Pipe annotation.
    - Ska stå vem som är inloggad när det gått bra
* Annan route där en enkelt läser från get eller post
    - enkel form som skickas...
* Middlewares i eget namespace
* Strunta i compiler passes, det kommer antagligen ändå inte vara så vanligt.
* Path generation (kan gärna vara i index...)
    - länkar i index och snygga beskrivningar om vad som bör hända...
* Middleware som wrappar hela appen...
    - kom på någonting roligt som den kan göra
* Info om när saker kan strykas från composer.json om de inte används..
* Route errors med factory
    - även för not logged in???
* Beskrivning här i readme om alla filer i src och vad de gör, såklart kort..
