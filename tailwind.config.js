// tailwind.config.js
module.exports = {
    theme: {
        fontFamily: {
            brand: ['Conviction', 'sans-serif'],
            display: ['AvenirMedium', 'sans-serif'],
            body: ['AvenirMedium', 'Helvetica', 'sans-serif'],
        },
        borderWidth: {
            default: '1px',
            '0': '0',
            '2': '2px',
            '4': '4px',
        },
        extend: {
            colors: {
                cyan: '#9cdbff',
                purple: '#7f5fbf',
                purpleclear : '#9c83ce',
                lightpurple : '#cbc2f6',
                pink: '#fa5c86',

                main : '#FF8C42',
                secondary : '#FF3C38',
                yellow : '#FFF275',
                blue : '#3A86FF',
                black : '#615D6C',
                fog: '#ebeaf5',
            },
            minHeight: {
                full: '100%',
                screen: '100vh',
                '4': '1rem',
                '5': '1.25rem',
                '6': '1.5rem',
                '8': '2rem',
                '10': '2.5rem',
                '12': '3rem',
                '16': '4rem',
                '20': '5rem',
                '24': '6rem',
                '32': '8rem',
                '64': '16rem'
            },
            maxHeight: {
                full: '100%',
                screen: '100vh',
                '4': '1rem',
                '5': '1.25rem',
                '6': '1.5rem',
                '8': '2rem',
                '10': '2.5rem',
                '12': '3rem',
                '16': '4rem',
                '20': '5rem',
                '24': '6rem',
                '32': '8rem',
                '64': '16rem'
            },
            spacing: {
                px: '1px',
                '0': '0',
                '1': '0.25rem',
                '2': '0.5rem',
                '3': '0.75rem',
                '4': '1rem',
                '5': '1.25rem',
                '6': '1.5rem',
                '8': '2rem',
                '10': '2.5rem',
                '12': '3rem',
                '16': '4rem',
                '20': '5rem',
                '24': '6rem',
                '32': '8rem',
                '40': '10rem',
                '48': '12rem',
                '56': '14rem',
                '64': '16rem',
            }
        }
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus' , 'group-hover', 'active'],
        textColor: ['responsive', 'hover', 'focus' , 'group-hover', 'active'],
        appearance: ['responsive', 'hover', 'focus' , 'group-hover', 'active'],
        visibility: ['responsive', 'hover', 'focus' , 'group-hover', 'active'],
    },
}