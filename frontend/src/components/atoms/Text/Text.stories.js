import Text from './Text.vue'

export default {
  title: 'Atoms/Text',
  component: Text,
  tags: ['autodocs'],
  argTypes: {
    size: {
      control: { type: 'select' },
      options: ['xs', 'sm', 'base', 'lg', 'xl']
    },
    weight: {
      control: { type: 'select' },
      options: ['normal', 'medium', 'semibold', 'bold']
    },
    color: {
      control: { type: 'select' },
      options: ['gray-900', 'gray-700', 'gray-500', 'green-600', 'red-600']
    }
  }
}

export const Default = {
  args: {
    default: 'Stock Ticker Text'
  }
}

export const Large = {
  args: {
    size: 'lg',
    default: 'Large Text'
  }
}

export const Bold = {
  args: {
    weight: 'bold',
    default: 'Bold Text'
  }
}

export const Green = {
  args: {
    color: 'green-600',
    default: 'Green Text'
  }
}
