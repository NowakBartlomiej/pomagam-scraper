import React from 'react'
import { useDailySum } from '../hooks/useDailySum'
import {CartesianGrid, Legend, Line, LineChart, Tooltip, XAxis, YAxis, BarChart, Bar} from 'recharts'

export const TotalSumChart = () => {
    const {data, isLoading} = useDailySum();
    const chartData = data?.data
    
    return (
        <BarChart width={730} height={250} data={chartData} margin={{ top: 5, right: 30, left: 40, bottom: 5 }}>
            <CartesianGrid strokeDasharray="3 3" />
            <XAxis dataKey="date" />
            <YAxis />
            <Tooltip />
            <Legend />
            <Bar dataKey="sum" fill="#8884d8" />
            
        </BarChart>
  )
}
