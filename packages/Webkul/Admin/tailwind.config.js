/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/Resources/**/*.blade.php", "./src/Resources/**/*.js"],

    theme: {
        container: {
            center: true,

            screens: {
                "2xl": "1920px",
            },

            padding: {
                DEFAULT: "16px",
            },
        },

        screens: {
            sm: "525px",
            md: "768px",
            lg: "1024px",
            xl: "1240px",
            "2xl": "1920px",
        },

        extend: {
            colors: {
                darkGreen: '#40994A',
                darkBlue: '#0044F2',
                darkPink: '#F85156',
            },

            fontFamily: {
                inter: ['Inter'],
                icon: ['icomoon']
            }
        },
    },
    
    darkMode: 'class',

    plugins: [],

    safelist: [
        {
            pattern: /bg-(green|orange|red|blue|cyan)-(50|100|500|600|700|900)/,
        },
        {
            pattern: /text-(green|orange|red|blue|cyan)-(200|300|400|500|600|700|900)/,
        },
        {
            pattern: /ring-(green|orange|red|blue|cyan)-(100|200|600|800)/,
        },
        {
            pattern: /ring-(green|orange|red|blue|cyan)-600\/20/,
        },
        {
            pattern: /ring-(green|orange|red|blue|cyan)-800\/30/,
        },
        // Dark mode background colors with opacity
        'dark:bg-green-900/20', 'dark:bg-green-900/10', 'dark:bg-green-900/30',
        'dark:bg-orange-900/20', 'dark:bg-orange-900/10', 'dark:bg-orange-900/30',
        'dark:bg-red-900/20', 'dark:bg-red-900/10', 'dark:bg-red-900/30',
        'dark:bg-blue-900/20', 'dark:bg-blue-900/10', 'dark:bg-blue-900/30',
        'dark:bg-cyan-900/20', 'dark:bg-cyan-900/10', 'dark:bg-cyan-900/30',
        'dark:bg-blue-500',
        // Dark mode text colors
        'dark:text-green-400', 'dark:text-green-200', 'dark:text-green-300',
        'dark:text-orange-400', 'dark:text-orange-300',
        'dark:text-red-400', 'dark:text-red-300',
        'dark:text-blue-400',
        // Dark mode ring colors
        'dark:ring-green-800', 'dark:ring-green-800/30',
        'dark:ring-orange-800', 'dark:ring-orange-800/30',
        'dark:ring-red-800', 'dark:ring-red-800/30',
        'dark:ring-blue-800', 'dark:ring-blue-800/30',
        'dark:ring-cyan-800',
        // Dark mode shadow colors
        'dark:shadow-green-400/40',
        'dark:shadow-orange-400/40',
        'dark:shadow-red-400/40',
        // Dark mode gradient from colors
        'dark:from-green-400', 'dark:from-green-500',
        'dark:from-orange-400', 'dark:from-orange-500',
        'dark:from-red-400', 'dark:from-red-500',
        'dark:from-blue-400', 'dark:from-blue-500', 'dark:from-blue-600',
        'dark:from-cyan-400', 'dark:from-cyan-500',
        // Dark mode gradient to colors
        'dark:to-green-500', 'dark:to-green-600',
        'dark:to-orange-500', 'dark:to-orange-600',
        'dark:to-red-500', 'dark:to-red-600',
        'dark:to-blue-500', 'dark:to-blue-600', 'dark:to-blue-700',
        'dark:to-cyan-500', 'dark:to-cyan-600',
        // Dark mode hover states
        'dark:hover:from-blue-600', 'dark:hover:to-blue-700',
        'dark:hover:bg-blue-600',
    ]
};
