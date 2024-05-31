const { createThemes } = require("tw-colors");

import colors from "tailwindcss/colors";

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        colors: {
            ...colors,
            transparent: "transparent",
            dark: "#1F2226",
            custom: "#CAF4FF",
            primary: "#FFF9D0",
            secondary: "var(--secondary-color)",
            "gray-light": "#F6F6F6",
            success: colors.green,
            alert: colors.yellow,
            error: colors.red,
            blueGray: colors.slate,
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
        require("preline/plugin"),
        createThemes({
            light: {
                default: {
                    50: "hsl(210, 40%, 98%)",
                    100: "hsl(210, 40%, 96.1%)",
                    200: "hsl(214.3, 31.8%, 91.4%)",
                    300: "hsl(212.7, 26.8%, 83.9%)",
                    400: "hsl(215, 20.2%, 65.1%)",
                    500: "hsl(215.4, 16.3%, 46.9%)",
                    600: "hsl(215.3, 19.3%, 34.5%)",
                    700: "hsl(215.3, 25%, 26.7%)",
                    800: "hsl(217.2, 32.6%, 17.5%)",
                    900: "hsl(222.2, 47.4%, 11.2%)",
                    950: "hsl(228.6, 84%, 4.9%)",
                },
                primary: {
                    100: "#cffafe",
                    200: "#a5f3fc",
                    300: "#67e8f9",
                    400: "#22d3ee",
                    500: "#06b6d4",
                    600: "#0891b2",
                    700: "#0e7490",
                    800: "#155e75",
                    900: "#164e63",
                },
            },
            dark: {
                default: {
                    50: "hsl(228.6, 84%, 4.9%)",
                    100: "hsl(222.2, 47.4%, 11.2%)",
                    200: "hsl(217.2, 32.6%, 17.5%)",
                    300: "hsl(215.3, 25%, 26.7%)",
                    400: "hsl(215.3, 19.3%, 34.5%)",
                    500: "hsl(215.4, 16.3%, 46.9%)",
                    600: "hsl(215, 20.2%, 65.1%)",
                    700: "hsl(212.7, 26.8%, 83.9%)",
                    800: "hsl(214.3, 31.8%, 91.4%)",
                    900: "hsl(210, 40%, 96.1%)",
                    950: "hsl(210, 40%, 98%)",
                },
                primary: {
                    100: "#cffafe",
                    200: "#a5f3fc",
                    300: "#67e8f9",
                    400: "#22d3ee",
                    500: "#06b6d4",
                    600: "#0891b2",
                    700: "#0e7490",
                    800: "#155e75",
                    900: "#164e63",
                },
            },
        }),
    ],
};
