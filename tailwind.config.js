/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./Vues/**/*.php', './css/**/*.css'],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [{
                mytheme: {
                    primary: "#BCB8AA",
                    secondary: "#BB9173",
                    accent: "#6C4C34",
                    neutral: "#6C4C34",
                    "base-100": "#D6C8BE",
                    "base-200": "#e0d9d5",
                },
            },
            "dark",
            "cupcake", "light",
        ],
    },
    plugins: [require("daisyui")],
}