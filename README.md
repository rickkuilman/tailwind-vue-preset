![Tailwind Vue PurgeCSS](https://user-images.githubusercontent.com/7881219/71671696-ff8ad900-2d73-11ea-8aa5-6b96e719b6d7.png)
# Tailwind Vue frontend preset

A Laravel 7.x frontend preset including:

* [TailwindCSS](https://tailwindcss.com/), a utility-first CSS framework
* [PurgeCSS](https://www.purgecss.com/), a tool to remove unused CSS
* [Vue.js](https://vuejs.org/), a progressive JavaScript framework
* The option to add compiled assets to `.gitignore`.
* An example Vue component with a simple axios request, added to the `welcome.blade.php`
* The full TailwindCSS config

## Installation

Use the package manager [composer](https://getcomposer.org/) to install tailwind-vue-preset.

```bash
composer require rickkuilman/tailwind-vue-preset --dev
```

## Usage

Run the following commands to use the preset

```bash
# Apply preset
php artisan preset tailwind-vue

# Compile assets
npm install && npm run dev
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
