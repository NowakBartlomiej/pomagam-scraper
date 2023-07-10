import React from 'react'
import { useDailyCollectionAmount } from '../hooks/useDailyCollectionAmount'
import {CartesianGrid, Legend, Line, LineChart, Tooltip, XAxis, YAxis, BarChart, Bar} from 'recharts'

export const DailyCollectionChart = () => {
  const {data, isLoading} = useDailyCollectionAmount();
  const chartData = data?.data;
  
    return (
        <LineChart width={730} height={250} data={chartData}
  margin={{ top: 5, right: 30, left: 20, bottom: 5 }}>
    <CartesianGrid strokeDasharray="3 3" />
    <XAxis dataKey="date" />
    <YAxis />
    <Tooltip />
    <Legend />
    <Line type="monotone" dataKey="daily_collection_amount" stroke="#8884d8" />
    
    </LineChart>
  )
}
