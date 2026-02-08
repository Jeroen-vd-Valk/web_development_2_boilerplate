# Frontend

A Vue 3 application built with Vite, Tailwind CSS, and Storybook, following atomic design principles.

## 🚀 Tech Stack

- **Vue 3** - Progressive JavaScript framework
- **Vite** - Frontend build tool
- **Tailwind CSS v4** - Utility-first CSS framework
- **Storybook** - Component development and documentation

## 📁 Project Structure

This project follows **Atomic Design** methodology, organizing components into five distinct levels:

```
src/
├── assets/           # Global styles and assets
│   └── main.css      # Tailwind CSS import
├── components/       # Component library
│   ├── atoms/        # Basic building blocks (Button, Text, PriceDisplay, etc.)
│   ├── molecules/    # Simple component groups (StockInfo, StockPrice)
│   ├── organisms/    # Complex components (StockCard, StockList)
│   ├── templates/    # Page-level layouts (StockTickerTemplate)
│   └── pages/        # Specific page instances (StockTickerPage)
├── config.js         # Application configuration
├── utils/            # Utility functions
│   └── api.js        # API request helpers
└── main.js           # Application entry point
```

## 🛠️ Setup

### Prerequisites

- Node.js ^20.19.0 or >=22.12.0
- npm or yarn

### Installation

```sh
npm install
```

## 🎯 Available Scripts

### Development

```sh
# Start development server
npm run dev

# Start Storybook
npm run storybook
```

### Production

```sh
# Build for production
npm run build

# Preview production build
npm run preview

# Build Storybook
npm run build-storybook
```

## ⚙️ Configuration

### API Configuration

The application uses environment variables for configuration. If you are using this outside a local environment and need to change config details, create a `.env` file in the frontend root:

```env
# API Domain - Base URL for API requests
VITE_API_DOMAIN=http://localhost
```

**Note:** In Vite, environment variables must be prefixed with `VITE_` to be exposed to client-side code.

The default API domain is `http://localhost`. Update this to match your backend server.

### Using the Config

```javascript
import config from "@/config";

// Access API domain
const apiDomain = config.apiDomain; // 'http://localhost'
```

## 📡 API Integration

The project includes a utility module for making API requests:

```javascript
import { get, post, put, del } from "@/utils/api";

// GET request
const response = await get("/stocks");
const stocks = await response.json();

// POST request
const newStock = await post("/stocks", {
  name: "AAPL",
  price: 150.25,
  previousPrice: 150.25,
});
```

## 🎨 Component Development

### Atomic Design Structure

- **Atoms**: Basic building blocks (Button, Text, PriceDisplay, PriceChangeIndicator)
- **Molecules**: Simple component groups (StockInfo, StockPrice)
- **Organisms**: Complex components (StockCard, StockList)
- **Templates**: Page layouts (StockTickerTemplate)
- **Pages**: Specific page instances (StockTickerPage)

### Creating Components

1. Place components in the appropriate atomic design folder
2. Use Tailwind CSS for styling
3. Create a Storybook story file (`.stories.js`) alongside the component
4. Follow Vue 3 Composition API with `<script setup>`

### Example Component

```vue
<template>
  <div class="p-4 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold">{{ title }}</h2>
    <p class="text-gray-600">{{ content }}</p>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  content: String,
});
</script>
```

## 📚 Storybook

Storybook is configured for component development and documentation.

### Running Storybook

```sh
npm run storybook
```

Stories are automatically discovered from `src/**/*.stories.@(js|jsx|mjs|ts|tsx)`.

### Viewing Components

- Open http://localhost:6006
- Browse components organized by atomic design level
- Interact with components using controls
- View documentation generated from component props

## 🎯 Stock Ticker Components

The application includes a complete set of stock ticker components:

### Atoms

- **Text**: Text with size, weight, and color options
- **PriceDisplay**: Formatted price display with currency symbol
- **PriceChangeIndicator**: Visual indicator (↑/↓) for price changes

### Molecules

- **StockInfo**: Stock name and price display
- **StockPrice**: Price with change indicator

### Organisms

- **StockCard**: Individual stock card displaying name, price, and change
- **StockList**: Grid layout for displaying multiple stock cards

### Templates

- **StockTickerTemplate**: Complete stock ticker page layout with header

### Pages

- **StockTickerPage**: Page that displays a list of stocks

## 📊 Stock Data Format

Stocks follow this format:

```javascript
{
  name: 'AAPL',
  price: 150.25,
  previousPrice: 150.25
}
```

## 📝 Development Guidelines

### Code Style

- Use Vue 3 Composition API with `<script setup>`
- Follow atomic design principles
- Use Tailwind CSS utility classes
- Write Storybook stories for all components
- Use TypeScript-style JSDoc comments

### Best Practices

1. **Component Organization**: Place components in appropriate atomic design folders
2. **Styling**: Use Tailwind CSS classes, avoid custom CSS when possible
3. **Props**: Define props with validators and default values
4. **Events**: Use `defineEmits` for component events
5. **API Calls**: Use the `api.js` utility functions
6. **Configuration**: Access config through `config.js`

## 🔧 Recommended IDE Setup

### VS Code

- [Vue (Official)](https://marketplace.visualstudio.com/items?itemName=Vue.volar) - Vue language support

### Browser Extensions

- **Chrome/Edge**: [Vue.js devtools](https://chromewebstore.google.com/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)
- **Firefox**: [Vue.js devtools](https://addons.mozilla.org/en-US/firefox/addon/vue-js-devtools/)

## 📖 Additional Resources

- [Vue 3 Documentation](https://vuejs.org/)
- [Vite Documentation](https://vite.dev/)
- [Tailwind CSS Documentation](https://tailwindcss.com/)
- [Storybook Documentation](https://storybook.js.org/)
- [Atomic Design Methodology](https://atomicdesign.bradfrost.com/)
