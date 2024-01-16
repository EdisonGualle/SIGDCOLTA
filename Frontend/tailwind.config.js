/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        primary: "#ecd006",
        secondary: {
          50: "#ebf7ff",
          100: "#d1eeff",
          200: "#aee2ff",
          300: "#76d3ff",
          400: "#35b9ff",
          500: "#0792ff",
          600: "#006cff",
          700: "#0053ff",
          800: "#0044d7",
          900: "#0046ba",
          950: "#062765",
        },
      },
    },
  },
  plugins: [require("@headlessui/tailwindcss")],
};
