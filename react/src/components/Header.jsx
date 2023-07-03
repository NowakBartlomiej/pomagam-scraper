import React from 'react'

export const Header = (props) => {
  return (
    <div>
        <h1 className='mb-6 text-3xl font-bold'>{props.title}</h1>
    </div>
  )
}
