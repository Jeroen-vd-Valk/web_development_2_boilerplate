import PriceDisplay from './PriceDisplay.vue'

export default {
  title: 'Atoms/PriceDisplay',
  component: PriceDisplay,
  tags: ['autodocs'],
  argTypes: {
    size: {
      control: { type: 'select' },
      options: ['sm', 'base', 'lg']
    },
    weight: {
      control: { type: 'select' },
      options: ['normal', 'medium', 'semibold', 'bold']
    }
  }
}

export const Default = {
  args: {
    price: 150.25
  }
}

export const Large = {
  args: {
    price: 150.25,
    size: 'lg'
  }
}

export const HighPrice = {
  args: {
    price: 3245.67
  }
}
