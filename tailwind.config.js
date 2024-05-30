const { createThemes } = require('tw-colors');

import colors from 'tailwindcss/colors';

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
        "node_modules/tw-elements/js/**/*.js"
    ],
    theme: {
        colors: {
            ...colors,
            transparent: "transparent",
            dark: "#1F2226",
            "bg-custom": "#F7F2F1",
            primary: "#FFF9D0",
            secondary: "#5AB2FF",
            "gray-light": "#F6F6F6",
            success: colors.green,
            alert: colors.yellow,
            error: colors.red,
            blueGray: colors.slate,
        },
        extend: {
            spacing: {
                '18': '72px',
                '16/12' : '4.12rem',
            },
            zIndex: {
                '70': '70',
                '60': '60',
            },
        },
    },
    plugins: [
        require('preline/plugin'),
    ],
}
