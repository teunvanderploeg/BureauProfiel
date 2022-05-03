const colors = require("tailwindcss/colors");
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/filament/**/*.blade.php",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                bp_white: '#FFF7EF',
                bp_orange: '#EA9010',
                bp_purple: '#582A5B',

                danger: colors.red,
                primary: colors.purple,
                success: colors.green,
                warning: colors.yellow,
                // white: colors.white,
                // gray: colors.gray,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
