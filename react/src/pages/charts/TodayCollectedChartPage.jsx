import React from 'react'
import { Header } from '../../components/Header'
import { DailyCollectionChart } from '../../components/DailyCollectionChart'

export const TodayCollectedChartPage = () => {
  return (
    <div>
      <Header title={"Dzienne Zebrane Kwoty"}/>

      <DailyCollectionChart />
    </div>
  )
}
