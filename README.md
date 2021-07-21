# Laratoast-jquery : Laravel Notification Package

[![Latest Stable Version](http://poser.pugx.org/afrizalmy/laratoast-jquery/v)](https://packagist.org/packages/afrizalmy/laratoast-jquery) [![Total Downloads](http://poser.pugx.org/afrizalmy/laratoast-jquery/downloads)](https://packagist.org/packages/afrizalmy/laratoast-jquery) [![Latest Unstable Version](http://poser.pugx.org/afrizalmy/laratoast-jquery/v/unstable)](https://packagist.org/packages/afrizalmy/laratoast-jquery) [![License](http://poser.pugx.org/afrizalmy/laratoast-jquery/license)](https://packagist.org/packages/afrizalmy/laratoast-jquery)

<p align="center"><img width="300" alt="laratoast" src="src/assets/img/pic1.png?raw=true"></p>
This is a laravel notification wrapper build with https://kamranahmed.info/toast library.


| Laravel Version     | Is Working? |
| ---      | ---       |
| 8.x | Yes         |
| 7.x | Yes        |
| 6.x | Yes        |


## Install

Using Composer

    composer require afrizalmy/laratoast-jquery

Then add the service provider to `config/app.php`. In Laravel versions 5.5 and above, this step can be skipped if package auto-discovery is enabled.

```php
'providers' => [
    ...
    Afrizalmy\Laratoast\LaratoastServiceProvider::class
    ...
];
```

As optional if you want to modify the default configuration, you can publish the configuration file:
 
```sh
php artisan vendor:publish --provider='Afrizalmy\Laratoast\LaratoastServiceProvider'
```

## Usage:

Include jQuery and your notification plugin assets in your view template: 

1. Add your styles links tag or `@laratoast_css`
2. Add your scripts links tags or `@laratoast_js`
3. Add `@laratoast_render` to render your notification
4. add `@laratoast_jquery` if you don't have jquery
5. use `laratoast()` helper function inside your controller to set a toast notification for info, success, warning or error
```php
// Display an info toast
laratoast()->info("Are you married?","Information","bottom-right");
```

as an example:
```php
<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $post = Post::create($request->only(['title', 'body']));

        if ($post instanceof Model) {
            laratoast()->success("Data has been saved successfully!","Success","bottom-right",['textAlign'=>'left']);

            return redirect()->route('posts.index');
        }
        laratoast()->error("An error has occurred please try again later.","Error!","bottom-center");

        return back();
    }
}
```

After that add the `@laratoast_render` at the bottom of your view to actualy render the laratoast notifications.

```blade
<!doctype html>
<html>
    <head>
        <title>afrizalmy/laratoast-jquery</title>
        @laratoast_jquery <!-- optional -->
        @laratoast_css
    </head>
    <body>
        
    </body>
    @laratoast_js
    @laratoast_render
</html>
```
### Options

```php
// laratoast()->success("Message","Title","position", "options"); 
laratoast()->success("Success notification test","Success","bottom-left"); 
// laratoast()->error("Message","Title","position", "options"); 
laratoast()->error("Error notification test","Error","bottom-right",['textAlign'=>'center']);
// laratoast()->warning("Message","Title","position", "options");       
laratoast()->warning("Warning notification test","Warning","bottom-center",['textAlign'=>'right']); 
// laratoast()->info("Message","Title","position", "options"); 
laratoast()->info("Info notification test","Info","top-left",['textAlign'=>'left']);
 ```
you can see the options in the ```config/laratoast``` file

## Donation

[https://saweria.co/afrizalmy](https://saweria.co/afrizalmy)


