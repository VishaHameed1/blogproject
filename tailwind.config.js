import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import lineClamp from '@tailwindcss/line-clamp';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
    ],

    safelist: [
        // Charcoal
        'bg-charcoal-900',
        'bg-charcoal-950',
        'bg-charcoal-800',
        'bg-[#0a0a0a]',
        'bg-[#121212]',
        // Paper & Ink
        'bg-paper',
        'bg-ink',
        'text-paper',
        'text-ink',
        // Rust - Full color palette
        'text-rust',
        'text-rust-50',
        'text-rust-100',
        'text-rust-200',
        'text-rust-300',
        'text-rust-400',
        'text-rust-500',
        'text-rust-600',
        'text-rust-700',
        'text-rust-800',
        'text-rust-900',
        'text-rust-950',
        'bg-rust',
        'bg-rust-50',
        'bg-rust-100',
        'bg-rust-200',
        'bg-rust-300',
        'bg-rust-400',
        'bg-rust-500',
        'bg-rust-600',
        'bg-rust-700',
        'bg-rust-800',
        'bg-rust-900',
        'bg-rust-950',
        'bg-rust/5',
        'bg-rust/10',
        'bg-rust/20',
        'bg-rust/30',
        'bg-rust/40',
        'bg-rust/50',
        'bg-rust/60',
        'bg-rust/70',
        'bg-rust/80',
        'bg-rust/90',
        'border-rust',
        'border-rust-500',
        'border-rust-600',
        'border-rust/10',
        'border-rust/20',
        'border-rust/30',
        'border-rust/40',
        'border-rust/50',
        'shadow-rust',
        'shadow-rust/20',
        'shadow-rust/30',
        'shadow-rust/40',
        'hover:bg-rust',
        'hover:bg-rust/80',
        'hover:bg-rust/90',
        'hover:text-rust',
        'hover:text-rust-400',
        'hover:text-rust-300',
        'hover:border-rust',
        'hover:border-rust/30',
        'hover:border-rust/50',
        'hover:shadow-rust/40',
        'focus:border-rust',
        'focus:ring-rust',
        'focus:ring-rust/30',
        'group-hover:text-rust',
        'group-hover:border-rust',
        // Animations
        'animate-fade-in',
        'animate-slide-up',
        'animate-pulse-glow',
        'animation-delay-100',
        'animation-delay-200',
        'animation-delay-300',
        'animation-delay-400',
        'animation-delay-500',
        // Poppins + Work Sans font classes
        'font-heading',
        'font-body',
        'font-sans',
        // Dark theme utilities
        'bg-black',
        'bg-[#0a0a0a]',
        'bg-[#121212]',
        'text-white',
        'text-white/75',
        'text-white/60',
        'text-white/50',
        'text-white/40',
        'text-white/30',
        'text-white/20',
        'border-white/5',
        'border-white/10',
        'hover:text-white',
        'hover:bg-white/5',
        'hover:border-white/10',
        // Decoration utilities
        'decoration-rust',
        'decoration-rust/30',
        'decoration-rust/50',
        'decoration-rust/70',
        'underline-offset-2',
        'underline-offset-4',
    ],

    theme: {
        extend: {
            colors: {
                // Ink & Paper (used in CSS)
                ink: '#1B1B1F',
                paper: '#FAFAF7',
                rustLight: '#d4783e',
                rustDark: '#a84722',
                black: '#1a1a1a',
                white: '#ffffff',

                // Charcoal Shades (Dark theme backgrounds)
                charcoal: {
                    800: '#1f1f23',
                    900: '#141417',
                    950: '#0b0b0d',
                },

                // Rust Shades Scale - Main color: #c45a2e
                rust: {
                    50: '#fbe9e0',
                    100: '#f7d4c2',
                    200: '#efa9a4',
                    300: '#e07e86',
                    400: '#d4783e',
                    500: '#c45a2e', // Main rust color
                    600: '#ad471e',
                    700: '#8c3514',
                    800: '#6b230a',
                    900: '#481908',
                    950: '#290b03',
                },
            },
            
            fontFamily: {
                // Poppins for headings (friendly, standout)
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
                // Work Sans for body (neutral, comfortable)
                body: ['Work Sans', ...defaultTheme.fontFamily.sans],
                // Default sans = Work Sans
                sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
            },
            
            animation: {
                'fade-in': 'fadeIn 0.8s ease-out forwards',
                'slide-up': 'slideUp 0.8s ease-out forwards',
                'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
            },
            
            keyframes: {
                fadeIn: {
                    from: { opacity: '0' },
                    to: { opacity: '1' },
                },
                slideUp: {
                    from: { opacity: '0', transform: 'translateY(30px)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                pulseGlow: {
                    '0%, 100%': { opacity: '0.3' },
                    '50%': { opacity: '0.6' },
                },
            },
            
            // Custom animation delays
            transitionDelay: {
                '100': '100ms',
                '200': '200ms',
                '300': '300ms',
                '400': '400ms',
                '500': '500ms',
            },
        },
    },

    plugins: [forms, lineClamp],
};