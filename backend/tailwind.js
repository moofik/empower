module.exports = {
    theme: {
        extend: {
            colors: {
                'pale': '#cdd4ca',
                'deep-orange': '#f2be54',
                'deep-gray': '#191a1d',
                'smoke-gray': '#e1e6df',
                'light-gray': '#f5f5f5',
                'muddy-gray': '#929d8e',
                'dk-blue': '#153e5c'
            },
            width: {
                '19/20': '95%',
                '24/25': '96%'
            },
            spacing: {
                '112': '22rem'
            },
        },
        inset: {
            '0': 0,
            '50p': '50%',
            '188': '188px',
            '112': '22rem'
        },
        screens: {
            'xs': {'min': '320px', 'max': '639px'},
            'sm': {'min': '640px'},
            'md': {'min': '768px'},
            'lg': {'min': '1024px'},
            'xl': {'min': '1280px'}
        }
    },
    variants: {
        borderStyle: ['responsive', 'hover', 'focus'],
        borderWidth: ['responsive', 'hover', 'focus']
    },
    plugins: []
};
