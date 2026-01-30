# Stock Ticker Application

A Vue.js stock ticker application that demonstrates core Vue.js concepts through a practical, real-world example. This project serves as an educational resource with detailed comments explaining Vue.js fundamentals.

## 📚 What This Project Demonstrates

This application illustrates key Vue.js concepts through a live stock ticker:

- **Reactivity** - Using `ref()` to create reactive data that automatically updates the UI
- **Lifecycle Hooks** - Using `onMounted()` and `onUnmounted()` to manage component setup and cleanup
- **Dynamic Styling** - Using `:class` binding to conditionally apply CSS classes based on data
- **List Rendering** - Using `v-for` to dynamically render arrays of data
- **Conditional Rendering** - Using `v-if`, `v-else-if`, and `v-else` to show different content
- **Automatic Updates** - Using `setInterval()` to update data at regular intervals
- **Component Structure** - Organizing code into reusable Vue Single-File Components

## 🎯 Features

- **Real-time Price Updates**: Stock prices automatically update every second
- **Visual Feedback**: Prices turn green when they increase, red when they decrease
- **Change Indicators**: Shows the dollar amount change for each stock
- **Clean UI**: Professional table layout with hover effects and smooth transitions
- **Well-Documented Code**: Extensive comments explaining Vue.js concepts for educational purposes

## 📁 Repository Structure

```
frontend/
├── index.html              # Entry HTML file
├── package.json            # Project dependencies and scripts
├── vite.config.js          # Vite build tool configuration
├── jsconfig.json           # JavaScript/TypeScript path aliases
├── assignment.md           # Assignment instructions and requirements
├── public/                 # Static assets
│   └── favicon.ico
└── src/                    # Source code
    ├── main.js             # Application entry point
    ├── App.vue             # Main root component
    ├── assets/             # Global styles and images
    │   ├── base.css
    │   ├── main.css
    │   └── logo.svg
    └── components/         # Vue components
        └── StockList.vue   # Stock ticker component
```
