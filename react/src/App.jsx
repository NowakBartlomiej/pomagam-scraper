import { Outlet } from "react-router-dom"
import { Sidebar } from "./components/Sidebar"
import TablePage from "./pages/TablePage"

function App() {

  return (
    <div className="flex">
      <Sidebar />
      <div className="p-6 pl-10">
        <Outlet />
      </div>
    </div>
  )
}

export default App
