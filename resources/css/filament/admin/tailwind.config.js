const preset = require('../../../../vendor/filament/filament/tailwind.config.preset').default;
const app = require('../../../../tailwind.config');

module.exports = {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: app.theme,
};
