const { createThemes } = require("tw-colors");

import colors from "tailwindcss/colors";

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
            "gray-light": "#F6F6F6",
            success: colors.green,
            alert: colors.yellow,
            error: colors.red,
            blueGray: colors.slate,
            secondary: {
                DEFAULT: "#5AB2FF",
                100: "#6ab9ff",
                200: "#7ac1ff",
                300: "#8bc9ff",
                400: "#9cd0ff",
                500: "#5ab2ff",
                600: "#51a0e5",
                700: "#488ecc",
                800: "#3e7cb2",
                900: "#366a99",
                1000: "#2d597f",
            },
        },
        extend: {
            spacing: {
                18: "72px",
                "16/12": "4.12rem",
            },
            zIndex: {
                70: "70",
                60: "60",
            },
        },
    },
    plugins: [
        require('preline/plugin'),
    ],
}
