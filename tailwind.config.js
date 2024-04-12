/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/html/**/*.{html,js}",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
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
          modal : '#EFF6E9',
          tidak : '#ED0000',
          iya : '#3AB81B',
        }
      },
      fontFamily :{
        poppins : ['Poppins'],
      },
    },
  },
  plugins: [],
}