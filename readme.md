This is a litecms 5 package that provides gallery management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/gallery`.

    "litecms/gallery": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Gallery\Providers\GalleryServiceProvider::class,

```

And also add it to alias

```php
'Gallery'  => Litecms\Gallery\Facades\Gallery::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="config"

Language files

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="lang"

Views files

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="views"
    


Public folders

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="public"


