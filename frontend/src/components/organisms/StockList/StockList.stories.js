import StockList from './StockList.vue'

export default {
  title: 'Organisms/StockList',
  component: StockList,
  tags: ['autodocs'],
  argTypes: {
    columns: {
      control: { type: 'select' },
      options: [1, 2, 3, 4]
    }
  }
}

export const SingleColumn = {
  args: {
    stocks: [
      { name: 'AAPL', price: 150.25, previousPrice: 150.25 },
      { name: 'MSFT', price: 324.50, previousPrice: 320.00 },
      { name: 'GOOGL', price: 142.30, previousPrice: 145.00 }
    ],
    columns: 1
  }
}

export const TwoColumns = {
  args: {
    stocks: [
      { name: 'AAPL', price: 150.25, previousPrice: 150.25 },
      { name: 'MSFT', price: 324.50, previousPrice: 320.00 },
      { name: 'GOOGL', price: 142.30, previousPrice: 145.00 },
      { name: 'AMZN', price: 128.45, previousPrice: 130.00 }
    ],
    columns: 2
  }
}

export const ThreeColumns = {
  args: {
    stocks: [
      { name: 'AAPL', price: 150.25, previousPrice: 150.25 },
      { name: 'MSFT', price: 324.50, previousPrice: 320.00 },
      { name: 'GOOGL', price: 142.30, previousPrice: 145.00 },
      { name: 'AMZN', price: 128.45, previousPrice: 130.00 },
      { name: 'TSLA', price: 245.60, previousPrice: 250.00 },
      { name: 'META', price: 312.80, previousPrice: 310.00 }
    ],
    columns: 3
  }
}
