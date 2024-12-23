import plugin from 'flowbite/plugin';

export default {
  darkMode: 'media',
  content: [
    './resources/views/**/*.blade.php',  // For Blade templates
    './resources/js/**/*.js',           // For JavaScript files
    './resources/css/**/*.css',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {},
  },
  plugins: [
    plugin({
      datatables: true,
    }),
  ],
};
