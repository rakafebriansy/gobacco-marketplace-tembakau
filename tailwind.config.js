/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        light:{
          primary: '#F5F5DC',
          secondary: '#004225',
          fill: '#9EB384',
          button: '#FFB000',
          putih : '#EFF6E9',
          hitam : '#19191B',
        }
      },
      fontFamily :{
        poppins : ['Poppins'],
      },
    },
  },
  plugins: [],
}