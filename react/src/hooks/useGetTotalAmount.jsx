import { useQuery } from '@tanstack/react-query'
import axios from 'axios'
import React from 'react'

export const useGetTotalAmount = () => {
  return useQuery({
    queryKey: ['getTotalAmount'],
    queryFn: async () => {
      const {data} = await axios.get(
        `http://127.0.0.1:8000/api/getTotalAmount`
      )
      return data;
    }
  })
}
