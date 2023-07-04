import React from 'react'
import { Header } from '../components/Header'
import { useCollections } from '../hooks/useCollections'


const TablePage = () => {
  const {data, isLoading} = useCollections()

  return (
    <div>
        <Header title="Tabela Zbiórek"/>

        <div>
            {isLoading ? 'Loading' : JSON.stringify(data)}
        </div>
    </div>
  )
}

export default TablePage