let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.combine([
    'resources/assets/backend/css/icons/icomoon/styles.css',
    'resources/assets/backend/css/bootstrap.css',
    'resources/assets/backend/css/core.css',
    'resources/assets/backend/css/components.css',
    'resources/assets/backend/css/colors.css',
    'resources/assets/backend/css/tablednd.css',
    'bower_components/form.validation/dist/css/formValidation.min.css',
    'bower_components/sweetalert2/dist/sweetalert2.min.css',
    'bower_components/Croppie/croppie.css',
    'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.css'
], 'public/css/admin.css');


mix.combine([
    'resources/assets/backend/js/plugins/loaders/pace.min.js',
    'resources/assets/backend/js/core/libraries/jquery.min.js',
    'resources/assets/backend/js/core/libraries/bootstrap.min.js',
    'resources/assets/backend/js/plugins/loaders/blockui.min.js',
    'resources/assets/backend/js/plugins/forms/styling/uniform.min.js',
    'resources/assets/backend/js/plugins/forms/selects/select2.min.js',
    'resources/assets/backend/js/core/app.js',
    'resources/assets/backend/js/plugins/ui/ripple.min.js',
    'resources/assets/backend/js/plugins/forms/styling/switchery.min.js',
    'resources/assets/backend/js/plugins/forms/styling/switch.min.js',
    'resources/assets/backend/js/plugins/forms/styling/uniform.min.js',
    'resources/assets/backend/js/plugins/forms/selects/bootstrap_multiselect.js',
    'resources/assets/backend/js/plugins/ui/moment/moment.min.js',
    'resources/assets/backend/js/plugins/pickers/daterangepicker.js',
    'resources/assets/backend/js/plugins/tables/datatables/datatables.min.js',
    'resources/assets/backend/js/plugins/forms/selects/select2.min.js',
    'resources/assets/backend/js/pages/form_layouts.js',
    'bower_components/ckeditor/ckeditor.js',
    'bower_components/ckeditor/adapters/jquery.js',
    'bower_components/form.validation/dist/js/formValidation.min.js',
    'bower_components/form.validation/dist/js/framework/bootstrap.min.js',
    'bower_components/sweetalert2/dist/sweetalert2.min.js',
    'bower_components/Croppie/croppie.min.js',
    'bower_components/uploaders/dropzone.min.js',
    'bower_components/uploaders/dropzoneDemo.min.js',
    'resources/assets/backend/js/custom-admin.js',
    'resources/assets/backend/tablednd.js',

], 'public/js/admin.js')
    .copyDirectory('resources/assets/backend/css/icons', 'public/css/icons')
    .copyDirectory('resources/assets/backend/css/icons/icomoon/fonts', 'public/css/fonts')
    .copy('bower_components/ckeditor/config.js', 'public/js/ckeditor/config.js')
    .copy('bower_components/ckeditor/styles.js', 'public/js/ckeditor/styles.js')
    .copy('bower_components/ckeditor/contents.css', 'public/js/ckeditor/contents.css')
    .copyDirectory('bower_components/ckeditor/skins', 'public/js/ckeditor/skins')
    .copyDirectory('bower_components/ckeditor/lang', 'public/js/ckeditor/lang')
    .copyDirectory('bower_components/ckeditor/plugins', 'public/js/ckeditor/plugins');

 mix.version();