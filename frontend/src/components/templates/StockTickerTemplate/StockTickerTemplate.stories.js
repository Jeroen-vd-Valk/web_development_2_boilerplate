import StockTickerTemplate from './StockTickerTemplate.vue'
import StockList from '../../organisms/StockList/StockList.vue'

export default {
  title: 'Templates/StockTickerTemplate',
  component: StockTickerTemplate,
  tags: ['autodocs']
}

export const Default = {
  render: () => ({
    components: { StockTickerTemplate, StockList },
    template: `
      <StockTickerTemplate>
        <StockList 
          :stocks="[
            { name: 'AAPL', price: 150.25, previousPrice: 150.25 },
            { name: 'MSFT', price: 324.50, previousPrice: 320.00 },
            { name: 'GOOGL', price: 142.30, previousPrice: 145.00 }
          ]"
          :columns="2"
        />
      </StockTickerTemplate>
    `
  })
}
