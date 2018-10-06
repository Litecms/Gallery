Lavalite package that provides gallery management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/gallery`.

    "litecms/gallery": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Litecms\Gallery\Providers\GalleryServiceProvider::class,

And also add it to alias

    'Gallery'  => Litecms\Gallery\Facades\Gallery::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\GalleryTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --tag="view"

**Publishing views to theme**

Publishes admin view
    php artisan theme:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --view=="admin" --theme=="admin"

Publishes client view
    php artisan theme:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --view=="default" --theme=="client"

Publishes user view
    php artisan theme:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --view=="default" --theme=="user"

Publishes public view
    php artisan theme:publish --provider="Litecms\Gallery\Providers\GalleryServiceProvider" --view=="public" --theme=="public"
## Usage


