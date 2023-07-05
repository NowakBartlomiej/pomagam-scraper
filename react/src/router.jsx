import {createBrowserRouter} from 'react-router-dom'
import App from './App';
import TablePage from './pages/TablePage';

const router = createBrowserRouter([
    {
        path: '/',
        element: <App/>,
        children: [
            {
                path: 'tabela-zbiorek',
                element: <TablePage />
            }
        ]
    },
    {
        path: '*',
        element: <h1>Page Not found 404</h1>
    }
])

export default router;