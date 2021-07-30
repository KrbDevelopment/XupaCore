module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    darkMode: false,
    theme: {
        placeholderColor: theme => theme('colors'),
        extend: {
            colors: {
                xupa: {
                    darkest: '#e43725',
                    dark: '#e43725',
                    DEFAULT: '#e74c3c',
                    light: '#ea6153',
                    lightest: '#ed7669'
                }
            }
        }
    },
    variants: {
        extend: {}
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ]
}
