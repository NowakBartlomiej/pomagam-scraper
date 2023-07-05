import React, { useState } from 'react'
import { useReactTable, getCoreRowModel, flexRender, getPaginationRowModel, getSortedRowModel, getFilteredRowModel  } from '@tanstack/react-table'
import { useCollections } from '../hooks/useCollections';

//TODO LOADING SCREEN
export const BasicTable = () => {
  const {data, isLoading} = useCollections()
 
  /** @type import('@tanstack/react-table').ColumnDef<any> */
  const columns = [
    {
      header: 'ID',
      accessorKey: 'id',
      footer: 'ID',
    },
    {
      header: 'Tytuł',
      accessorKey: 'title',
      footer: 'Tytuł',
    },
    {
      header: 'Slug',
      accessorKey: 'slug',
      footer: 'Slug',
    },
    {
      header: 'Ikona',
      accessorKey: 'image',
      cell: (props) => flexRender(
        <img
          className='w-28'
          src={props.row.original.image}
        />
      )
    },
    {
      header: 'Numer Id',
      accessorKey: 'numberId',
      footer: 'Numer Id',
    },
    {
      header: 'Suma',
      accessorKey: 'amount',
      footer: 'Suma',
    },
    {
      header: 'Kategoria',
      accessorKey: 'category',
      footer: 'Kategoria',
    },
  ]
  
  const [sorting, setSorting] = useState([]);
  const [filtering, setFiltering] = useState('');

  const table = useReactTable({
    data: data?.data,
    columns,
    getCoreRowModel: getCoreRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    state: {
      sorting: sorting,
      globalFilter: filtering,
    },
    onSortingChange: setSorting,
    onGlobalFilterChange: setFiltering,
    
  });

  
  
  return (
    <div className="overflow-x-auto shadow-md sm:rounded-lg">
      {isLoading ? 'loading' :
      (
        <>
        <div className='w-80 mb-4'>
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
            </div>
            <input 
            value={filtering}
            onChange={(e) => setFiltering(e.target.value)}
            type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500     " placeholder="Szukaj..."></input>
          </div>
        </div>

        <table className='w-full text-base text-lef'>
        <thead className='text-sm text-gray-800 uppercase bg-gray-300'>
          {table.getHeaderGroups().map((headerGroup) => (
            <tr 
            key={headerGroup.id}>
              {headerGroup.headers.map(header => (
                <th 
                onClick={header.column.getToggleSortingHandler()}
                className='px-6 py-3'
                key={header.id}>
                  {flexRender(header.column.columnDef.header, header.getContext())}
                  {
                    {asc: '🔼', desc: '🔽'} [header.column.getIsSorted() ?? null]
                  }
                </th>
              ))}
            </tr>
          ))}
        </thead>
      
        <tbody className='bg-white border-b'>
          {table.getRowModel().rows.map(row => (
            <tr 
            className='px-6 py-4 text-gray-900 whitespace-nowrap border-b'
            key={row.id}>
              {row.getVisibleCells().map(cell => (
                <td 
                className='px-4 py-2.5'
                key={cell.id}> 
                  {flexRender(cell.column.columnDef.cell, cell.getContext())}
                </td>
              ))}
            </tr>
          ))}
        </tbody>

      </table>

      <div className='flex center items-center justify-between px-3'>
        <div>
        
          <button
            onClick={() => table.setPageIndex(0)}
            disabled={!table.getCanPreviousPage()}
            className='border m-2 p-2'
          >
            {"<<"}
          </button>

          <button
            onClick={() => table.previousPage()}
            disabled={!table.getCanPreviousPage()}
            className='border m-2 p-2'
          >
            {"<"}
          </button>

          <button
            onClick={() => table.nextPage()}
            disabled={!table.getCanNextPage()}
            className='border m-2 p-2'
          >
            {">"}
          </button>

          <button
            onClick={() => table.setPageIndex(table.getPageCount() - 1)}
            disabled={!table.getCanNextPage()}
            className='border m-2 p-2'
          >
            {">>"}
          </button>



          {/* <button 
            onClick={() => {
              table.previousPage()
            }} 
            disabled={!table.getCanPreviousPage()} 
            className='border m-2 p-2'
          >Poprzednia</button>

          <button 
            onClick={() => {
            table.setPageIndex(0)
            }} 
            className='border m-2 p-2'
          >1</button>

          {table.getCanNextPage && (
            <button onClick={() => {
              table.setPageIndex(0)
            }} className='border m-2 p-2'>{table.getPageCount()}</button>
          )} */}

        
        </div>
        
        <div>
          <p>Strona {table.getState().pagination.pageIndex + 1} z {table.getPageCount()}</p>
        </div>

      </div>

      </>
      )
      }
    </div>
  )
}
