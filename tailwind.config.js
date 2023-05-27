/** @type {import('tailwindcss').Config} */

const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#4db2ec",
                    hover: "#168ed6",
                    font: "#3547ac",
                    bg: "#f8f9fd",
                },
                sky: colors.sky,
                teal: colors.teal,
            },
        },
    },
    plugins: [],
};
