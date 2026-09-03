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
        // Light theme colors
        'bg-[#F8F9FA]',
        'bg-white',
        'bg-[#FFFFFF]',
        'text-[#111827]',
        'text-[#6B7280]',
        'text-[#9CA3AF]',
        
        // Primary - Purple
        'text-purple',
        'text-purple-50',
        'text-purple-100',
        'text-purple-200',
        'text-purple-300',
        'text-purple-400',
        'text-purple-500',
        'text-purple-600',
        'text-purple-700',
        'text-purple-800',
        'text-purple-900',
        'text-purple-950',
        'bg-purple',
        'bg-purple-50',
        'bg-purple-100',
        'bg-purple-200',
        'bg-purple-300',
        'bg-purple-400',
        'bg-purple-500',
        'bg-purple-600',
        'bg-purple-700',
        'bg-purple-800',
        'bg-purple-900',
        'bg-purple-950',
        'bg-purple/5',
        'bg-purple/10',
        'bg-purple/20',
        'bg-purple/30',
        'bg-purple/40',
        'bg-purple/50',
        'bg-purple/60',
        'bg-purple/70',
        'bg-purple/80',
        'bg-purple/90',
        'border-purple',
        'border-purple-500',
        'border-purple-600',
        'border-purple/10',
        'border-purple/20',
        'border-purple/30',
        'border-purple/40',
        'border-purple/50',
        'shadow-purple',
        'shadow-purple/20',
        'shadow-purple/30',
        'shadow-purple/40',
        'hover:bg-purple',
        'hover:bg-purple/80',
        'hover:bg-purple/90',
        'hover:text-purple',
        'hover:text-purple-400',
        'hover:text-purple-300',
        'hover:border-purple',
        'hover:border-purple/30',
        'hover:border-purple/50',
        'hover:shadow-purple/40',
        'focus:border-purple',
        'focus:ring-purple',
        'focus:ring-purple/30',
        'group-hover:text-purple',
        'group-hover:border-purple',
        
        // Secondary - Blue
        'text-blue',
        'text-blue-50',
        'text-blue-100',
        'text-blue-200',
        'text-blue-300',
        'text-blue-400',
        'text-blue-500',
        'text-blue-600',
        'text-blue-700',
        'text-blue-800',
        'text-blue-900',
        'text-blue-950',
        'bg-blue',
        'bg-blue-50',
        'bg-blue-100',
        'bg-blue-200',
        'bg-blue-300',
        'bg-blue-400',
        'bg-blue-500',
        'bg-blue-600',
        'bg-blue-700',
        'bg-blue-800',
        'bg-blue-900',
        'bg-blue-950',
        'bg-blue/5',
        'bg-blue/10',
        'bg-blue/20',
        'bg-blue/30',
        'bg-blue/40',
        'bg-blue/50',
        'bg-blue/60',
        'bg-blue/70',
        'bg-blue/80',
        'bg-blue/90',
        'border-blue',
        'border-blue-500',
        'border-blue-600',
        'border-blue/10',
        'border-blue/20',
        'border-blue/30',
        'border-blue/40',
        'border-blue/50',
        'shadow-blue',
        'shadow-blue/20',
        'shadow-blue/30',
        'shadow-blue/40',
        'hover:bg-blue',
        'hover:bg-blue/80',
        'hover:bg-blue/90',
        'hover:text-blue',
        'hover:text-blue-400',
        'hover:text-blue-300',
        'hover:border-blue',
        'hover:border-blue/30',
        'hover:border-blue/50',
        'hover:shadow-blue/40',
        'focus:border-blue',
        'focus:ring-blue',
        'focus:ring-blue/30',
        'group-hover:text-blue',
        'group-hover:border-blue',
        
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
        'bg-[#0A0A0A]',
        'bg-[#1A1A1A]',
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
        
        // Border colors
        'border-[#E5E7EB]',
        'border-[#2A2A2A]',
        
        // Decoration utilities
        'decoration-purple',
        'decoration-purple/30',
        'decoration-purple/50',
        'decoration-purple/70',
        'underline-offset-2',
        'underline-offset-4',
        
        // Theme toggle
        'theme-toggle',
    ],

    theme: {
        extend: {
            colors: {
                // Light theme colors
                'bg-light': '#F8F9FA',
                'bg-card': '#FFFFFF',
                'text-primary': '#111827',
                'text-secondary': '#6B7280',
                'text-muted': '#9CA3AF',
                'border-light': '#E5E7EB',
                
                // Dark theme colors
                'bg-dark': '#0A0A0A',
                'bg-card-dark': '#1A1A1A',
                'text-primary-dark': '#FFFFFF',
                'text-secondary-dark': '#A0A0A0',
                'text-muted-dark': '#6B7280',
                'border-dark': '#2A2A2A',

                // Primary - Purple (#7C3AED)
                purple: {
                    50: '#F5F3FF',
                    100: '#EDE9FE',
                    200: '#DDD6FE',
                    300: '#C4B5FD',
                    400: '#A78BFA',
                    500: '#7C3AED', // Main purple
                    600: '#6D28D9',
                    700: '#5B21B6',
                    800: '#4C1D95',
                    900: '#3B0764',
                    950: '#2E1065',
                },
                
                // Secondary - Blue (#3B82F6)
                blue: {
                    50: '#EFF6FF',
                    100: '#DBEAFE',
                    200: '#BFDBFE',
                    300: '#93C5FD',
                    400: '#60A5FA',
                    500: '#3B82F6', // Main blue
                    600: '#2563EB',
                    700: '#1D4ED8',
                    800: '#1E40AF',
                    900: '#1E3A8A',
                    950: '#172554',
                },

                // Legacy - kept for backward compatibility
                ink: '#1B1B1F',
                paper: '#FAFAF7',
                black: '#1A1A1A',
                white: '#FFFFFF',

                // Charcoal Shades (Dark theme backgrounds) - kept for compatibility
                charcoal: {
                    800: '#1F1F23',
                    900: '#141417',
                    950: '#0B0B0D',
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