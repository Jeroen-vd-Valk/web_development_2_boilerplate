import PriceChangeIndicator from './PriceChangeIndicator.vue'

export default {
  title: 'Atoms/PriceChangeIndicator',
  component: PriceChangeIndicator,
  tags: ['autodocs']
}

export const Up = {
  args: {
    price: 155.25,
    previousPrice: 150.25
  }
}

export const Down = {
  args: {
    price: 145.25,
    previousPrice: 150.25
  }
}

export const NoChange = {
  args: {
    price: 150.25,
    previousPrice: 150.25
  }
}
