import StockCard from './StockCard.vue'

export default {
  title: 'Organisms/StockCard',
  component: StockCard,
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

export const PriceUp = {
  args: {
    stock: {
      name: 'AAPL',
      price: 155.25,
      previousPrice: 150.25
    }
  }
}

export const PriceDown = {
  args: {
    stock: {
      name: 'AAPL',
      price: 145.25,
      previousPrice: 150.25
    }
  }
}

export const HighPrice = {
  args: {
    stock: {
      name: 'MSFT',
      price: 324.50,
      previousPrice: 320.00
    }
  }
}
