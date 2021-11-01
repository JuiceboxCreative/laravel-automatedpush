
# Juicebox Automated GIT push

Use PHPUnit testing via Laravel's artisan test command and git's pre-push hook to make your code more reliable.

**Requirements:**

* [Laravel](https://laravel.com/docs)

### Install the package

To get started, please include the repository VCS reference and then require the

```bash
composer config repositories.automatedpush vcs git@bitbucket.org:JuiceBoxCreative/laravel-automatedpush.git
composer require juicebox/automatedpush --dev
```

### Run the setup command

This will publish the file required to `.git/hooks/pre-push`, and that's it!

```bash
php artisan automatedpush:setup
```

Make sure the file has user executable access:

```bash
chmod u+x .git/hooks/pre-push
```

## Run a new commit and push ##

Obviously, change a file and then commit it with a descriptive message. Then push.

```bash
git add .
git commit -m "Insert comment here"
git push
```

Provided the script was added correctly, it should now run through the tests. If any failed, it will show you where, and you will need to fix before pushing.

## Manually run tests ##

To run your tests manually before you fail on push, you could do this via Laravel first:

```
php artisan test
```

## Test notes ##

The tests are found in `tests/Feature` and `tests/Unit`. Any file ending in `Test.php` will be run automatically. See [Laravel Testing](https://laravel.com/docs/8.x/testing) for more information.

There is a database schema which is imported to the staging database found in `.env.testing`. This was the initial data we had to work with to test our PHP calculations were correct.
