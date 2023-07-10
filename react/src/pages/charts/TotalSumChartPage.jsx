import React from 'react'
import { Header } from '../../components/Header'
import { TotalSumChart } from '../../components/TotalSumChart'

const TotalSumChartPage = () => {
  return (
    <div>
      <Header title={"Dzienne Sumy Całkowite"}/>

      <TotalSumChart /> 
    </div>
  )
}

export default TotalSumChartPage