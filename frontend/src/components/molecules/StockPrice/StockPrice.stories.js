import StockPrice from './StockPrice.vue'

export default {
  title: 'Molecules/StockPrice',
  component: StockPrice,
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

export const Up = {
  args: {
    stock: {
      name: 'AAPL',
      price: 155.25,
      previousPrice: 150.25
    }
  }
}

export const Down = {
  args: {
    stock: {
      name: 'AAPL',
      price: 145.25,
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
    size: 'lg'
  }
}
