# Notification

## Create new notification

```
php artisan make:notification WelcomeNotification
```

## Setup Mail Settings

Open up `.env`, setup all with prefix `MAIL_`.

For development, you can use mailtrap.io.

```
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Make sure to run `php artisan config:cache` afterwards.

## Use Notifiable Trait

Include Notifiable trait

```
use Illuminate\Notifications\Notifiable;

class Something {
	use Notifiable;
}
```

## Usage

A simple POC, just open up `routes/console.php`, and paste the following:

```php
use App\User;

Artisan::command('sendmail', function () {
    $user = App\User::find(1);
    $user->notify(new \App\Notifications\WelcomeNotification());
});
```

And then in terminal, run `php artisan sendmail`. You should receive emails in your mailtrap.io account.