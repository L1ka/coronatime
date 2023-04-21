/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            green: "#0FBA68",
            dark: "#010414",
            "dark-4": "#F6F6F7",
            "light-dark": "#808189",
            blue: "#2029F3",
            yellow: "#EAD621",
            gray: "#E6E6E7",
            red: "#CC1E1E",
            white: "#ffffff",
        },
        fontFamily: {
            inter: "Inter, sans-serif",
        },
        extend: {
            fontSize: {
                "xs-1": ["14px", { lineHeight: "17px", fontWeight: "400" }],
                "xs-2": ["14px", { lineHeight: "17px", fontWeight: "600" }],
                "xs-3": ["14px", { lineHeight: "17px", fontWeight: "700" }],
                "xs-4": ["14px", { lineHeight: "17px", fontWeight: "900" }],
                "sm-1": ["16px", { lineHeight: "19px", fontWeight: "400" }],
                "sm-2": ["16px", { lineHeight: "19px", fontWeight: "500" }],
                "sm-3": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                "sm-4": ["20px", { lineHeight: "24px", fontWeight: "400" }],
                m: ["20px", { lineHeight: "24px", fontWeight: "500" }],
                lg: ["20px", { lineHeight: "24px", fontWeight: "900" }],
                xl: ["25px", { lineHeight: "30px", fontWeight: "900" }],
                "2xl": ["39px", { lineHeight: "47px", fontWeight: "900" }],
            },
            boxShadow: {
                "3xl": "1px 2px 8px rgba(0, 0, 0, 0.04)",
                input: "-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB;",
            },
        },
    },
    plugins: [require("tailwind-scrollbar")],
};
