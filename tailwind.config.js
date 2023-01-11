/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./Vue/**/*.php', './css/**/*.css'],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [{
                mytheme: {
                    primary: "#BCB8AA",
                    secondary: "#BCB8AA",
                    accent: "#BCB8AA",
                    neutral: "#BCB8AA",
                    "base-100": "#D6C8BE",
                },
            },
            "dark",
            "cupcake", "light",
        ],
    },
    plugins: [require("daisyui")],
}