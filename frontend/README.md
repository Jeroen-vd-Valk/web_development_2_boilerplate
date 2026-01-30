# Vue.js Learning Demo

A beginner-friendly Vue.js application demonstrating core concepts from the Composition API. This project serves as an educational resource with detailed comments explaining Vue.js fundamentals.

## 📚 What This Project Demonstrates

This application illustrates key Vue.js concepts:
- **Reactivity** - Using `ref()` to create reactive data
- **Computed Properties** - Automatic calculations that update when dependencies change
- **Event Handling** - Responding to user interactions with `@click`
- **Two-Way Data Binding** - Using `v-model` for form inputs
- **Conditional Rendering** - Showing/hiding elements with `v-if` and `v-else`
- **Props** - Passing data from parent to child components
- **Lifecycle Hooks** - Running code at specific component lifecycle moments

## 📁 Repository Structure

```
frontend/
├── index.html              # Entry HTML file
├── package.json            # Project dependencies and scripts
├── vite.config.js          # Vite build tool configuration
├── jsconfig.json           # JavaScript/TypeScript path aliases
├── notes.md                # Learning notes and concepts
├── public/                 # Static assets
│   └── favicon.ico
└── src/                    # Source code
    ├── main.js             # Application entry point
    ├── App.vue             # Main root component
    ├── assets/             # Global styles and images
    │   ├── base.css
    │   ├── main.css
    │   └── logo.svg
    └── components/          # Vue components
        └── UserCard.vue    # Example component demonstrating props
```

## 📄 Main Files Explained

### `index.html`
The single HTML page that serves as the entry point for the application. Vue will mount the app to the `<div id="app">` element.

**Relevant Documentation:**
- [Vite HTML Entry Point](https://vite.dev/guide/#index-html-and-project-root)
- [Vue Application Mounting](https://vuejs.org/guide/essentials/application.html)

### `src/main.js`
The JavaScript entry point that:
1. Imports global CSS styles
2. Creates the Vue application instance
3. Imports the root `App.vue` component
4. Mounts the app to the DOM element with id `"app"`

**Key Concepts:**
- `createApp()` - Creates a new Vue application instance
- `.mount()` - Attaches the Vue app to a DOM element

**Relevant Documentation:**
- [Creating a Vue Application](https://vuejs.org/guide/essentials/application.html#creating-an-application)
- [Application API](https://vuejs.org/api/application.html)

### `src/App.vue`
The root component of the application. This is a **Vue Single-File Component (SFC)** that demonstrates:
- Reactivity with `ref()`
- Computed properties with `computed()`
- Lifecycle hooks with `onMounted()`
- Template syntax (interpolation, directives, event handling)
- Using child components with props

**Vue Single-File Component Structure:**
- `<template>` - HTML markup with Vue directives
- `<script setup>` - JavaScript logic using Composition API
- `<style scoped>` - Component-scoped CSS styles

**Relevant Documentation:**
- [Single-File Components](https://vuejs.org/guide/scaling-up/sfc.html)
- [Composition API](https://vuejs.org/guide/extras/composition-api-faq.html)
- [Template Syntax](https://vuejs.org/guide/essentials/template-syntax.html)
- [Reactivity Fundamentals](https://vuejs.org/guide/essentials/reactivity-fundamentals.html)
- [Computed Properties](https://vuejs.org/guide/essentials/computed.html)
- [Lifecycle Hooks](https://vuejs.org/guide/essentials/lifecycle.html)

### `src/components/UserCard.vue`
A child component that demonstrates:
- **Props** - Receiving data from parent components using `defineProps()`
- Using props in templates and computed properties
- Component reusability

**Relevant Documentation:**
- [Props](https://vuejs.org/guide/components/props.html)
- [defineProps()](https://vuejs.org/api/sfc-script-setup.html#defineprops-defineemits)

### `vite.config.js`
Configuration file for Vite, the build tool. Configures:
- Vue plugin for processing `.vue` files
- Vue DevTools plugin for development
- Path aliases (e.g., `@/` maps to `./src/`)

**Relevant Documentation:**
- [Vite Configuration](https://vite.dev/config/)
- [Vite Vue Plugin](https://github.com/vitejs/vite-plugin-vue)

### `package.json`
Defines project metadata, dependencies, and npm scripts:
- **dependencies**: Runtime dependencies (Vue 3)
- **devDependencies**: Development tools (Vite, Vue plugins)
- **scripts**: Available npm commands

**Available Scripts:**
- `npm run dev` - Start development server with hot-reload
- `npm run build` - Build for production
- `npm run preview` - Preview production build locally

**Relevant Documentation:**
- [package.json Guide](https://docs.npmjs.com/cli/v9/configuring-npm/package-json)
- [Vite CLI](https://vite.dev/guide/cli.html)

### `jsconfig.json`
Configures JavaScript/TypeScript path aliases for better imports. Allows you to use `@/` instead of relative paths like `../../../`.

**Example:**
```javascript
// Instead of: import App from '../../../App.vue'
import App from '@/App.vue'
```

**Relevant Documentation:**
- [jsconfig.json Reference](https://code.visualstudio.com/docs/languages/jsconfig)

### `notes.md`
Educational notes covering Vue.js concepts and best practices. Refer to this file for detailed explanations of Vue.js fundamentals.

## 🚀 Getting Started

### Prerequisites
- Node.js version 20.19.0 or >= 22.12.0
- npm (comes with Node.js)

### Installation

1. **Install dependencies:**
   ```sh
   npm install
   ```

2. **Start the development server:**
   ```sh
   npm run dev
   ```
   The app will be available at `http://localhost:5173` (or another port if 5173 is busy)

3. **Build for production:**
   ```sh
   npm run build
   ```
   Creates optimized production files in the `dist/` directory

4. **Preview production build:**
   ```sh
   npm run preview
   ```
   Serves the production build locally for testing

## 🛠️ Recommended IDE Setup

### VS Code
- Install [Vue (Official)](https://marketplace.visualstudio.com/items?itemName=Vue.volar) extension
- Disable Vetur if you have it installed (Volar replaces it)

### Browser DevTools
- **Chrome/Edge/Brave:** Install [Vue.js devtools](https://chromewebstore.google.com/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)
- **Firefox:** Install [Vue.js devtools](https://addons.mozilla.org/en-US/firefox/addon/vue-js-devtools/)

## 📖 Learning Resources

### Official Documentation
- [Vue.js Documentation](https://vuejs.org/) - Complete Vue.js guide
- [Vue.js API Reference](https://vuejs.org/api/) - API documentation
- [Vue.js Tutorial](https://vuejs.org/tutorial/) - Interactive tutorial
- [Vite Documentation](https://vite.dev/) - Build tool documentation

### Key Concepts to Explore
- [Reactivity Fundamentals](https://vuejs.org/guide/essentials/reactivity-fundamentals.html)
- [Template Syntax](https://vuejs.org/guide/essentials/template-syntax.html)
- [Computed Properties](https://vuejs.org/guide/essentials/computed.html)
- [Components Basics](https://vuejs.org/guide/essentials/component-basics.html)
- [Props](https://vuejs.org/guide/components/props.html)
- [Lifecycle Hooks](https://vuejs.org/guide/essentials/lifecycle.html)

## 🎯 Project Features

- ✅ Composition API with `<script setup>` syntax
- ✅ Reactive data with `ref()`
- ✅ Computed properties
- ✅ Event handling
- ✅ Two-way data binding
- ✅ Conditional rendering
- ✅ Props demonstration
- ✅ Lifecycle hooks
- ✅ Scoped CSS styling
- ✅ Hot Module Replacement (HMR) for fast development

## 📝 Notes

- This project uses Vue 3 with the Composition API (recommended approach)
- All components use Single-File Component (`.vue`) format
- Styles are scoped to components to prevent CSS conflicts
- The project uses Vite for fast development and optimized builds

## 🤝 Contributing

This is an educational project. Feel free to experiment, modify, and learn from the code!

## 📄 License

This project is for educational purposes.
