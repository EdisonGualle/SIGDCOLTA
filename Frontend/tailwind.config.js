/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        primary: "#ecd006",
        secondary: {
          100: "#ebf7ff",
          900: "#243300",
        },
      },
    },
  },
  plugins: [require("@headlessui/tailwindcss")],
};
