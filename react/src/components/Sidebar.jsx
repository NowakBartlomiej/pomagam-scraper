import React, { useState } from 'react'
import {BsArrowLeftShort, BsBarChartFill, BsChevronDown} from 'react-icons/bs'
import {RiDashboardFill} from 'react-icons/ri';
import {AiOutlineTable} from 'react-icons/ai'
import { useNavigate } from 'react-router-dom';

export const Sidebar = () => {
  const navigate = useNavigate();

  const [open, setOpen] = useState(true);
  const [submenuOpen, setSubmenuOpen] = useState(false);
  
  const Menus = [
    {
      title: "Tabela Zbiórek",
      path: 'tabela-zbiorek',
      icon: <AiOutlineTable/>

    },
    {title: "Option 2"},
    {title: "Option 3"},
    {
      title: "Menu",
      submenu: true,
      submenuItems: [
        {title: "Sub 1"},
        {title: "Sub 2"},
        {title: "Sub 3"},
      ]
    },
    {title: "Option 4"},
    {title: "Option 5"},
  ];
   
  return (
    <div className={`bg-slate-100 h-screen p-5 pt-6 ${open ? 'w-72' : 'w-20'} duration-300 relative`}>
      {/* Toggle button */}
      <BsArrowLeftShort 
        onClick={() => setOpen(!open)}
        className={`text-black text-4xl bg-white border rounded-full absolute -right-4 top-6 cursor-pointer ${!open && 'rotate-180'}`}/>

      {/* Logo */}
      <div className='inline-flex'>
        <BsBarChartFill className={`${open && 'rotate-[360deg]'} bg-white rounded p-1 text-4xl cursor-pointer block float-left mr-2 duration-300`}/>
        <h1 className={`${!open && 'scale-0'} text-black text-2xl font-medium duration-300`}>pomagam.pl</h1>
      </div>  

      {/* Options */}
      <ul className='pt-2'>
      {Menus.map((menu, index) => (
        <>
          <li 
          onClick={() => {
            if (menu.path) {
              navigate(menu.path);
            }
          }}
          key={index} className={`text-slate-800 text-sm flex items-center gap-x-4 cursor-pointer p-2
            hover:bg-slate-200 rounded-md mt-2
          `}>
            <span className='text-2xl block float-left'>
                {menu.icon ? menu.icon : <RiDashboardFill/>}
            </span>

            <span className={`text-base font-medium flex-1 ${!open && 'hidden'} duration-300`}>
              {menu.title}
            </span>

            {menu.submenu && open && (
              <BsChevronDown 
              onClick={() => {
                setSubmenuOpen(!submenuOpen)
              }}
              className={`${submenuOpen && 'rotate-180'}`} />
            )}
          </li>
          {menu.submenu && submenuOpen && open && (
            <ul>
              {menu.submenuItems.map((submenuItem, index) => (
                <li key={index}
                className={`text-slate-800 text-sm flex items-center gap-x-4 cursor-pointer p-2
            hover:bg-slate-200 rounded-md mt-2 px-5
                `}>
                  {submenuItem.title}
                </li>
              ))}
            </ul>
          )}
        </>
      ))}
      </ul>
    </div>
  )
}
