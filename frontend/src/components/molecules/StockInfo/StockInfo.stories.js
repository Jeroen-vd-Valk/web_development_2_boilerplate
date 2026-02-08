import StockInfo from './StockInfo.vue'

export default {
  title: 'Molecules/StockInfo',
  component: StockInfo,
  tags: ['autodocs']
}

export const Default = {
  args: {
    stock: {
      name: 'AAPL',
      price: 150.25,
      previousPrice: 150.25
    }
  }
}

export const WithPriceChange = {
  args: {
    stock: {
      name: 'AAPL',
      price: 155.25,
      previousPrice: 150.25
    }
  }
}

export const Large = {
  args: {
    stock: {
      name: 'MSFT',
      price: 324.50,
      previousPrice: 320.00
    },
    size: 'lg',
    priceSize: 'base'
  }
}
