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
            },

            {
                path: 'kwota-zebrana-dzisiaj',
                element: <h1>kwota-zebrana-dzisiaj</h1>
            },

            {
                path: 'kwota-zebrana-calkowicie',
                element: <h1>kwota-zebrana-calkowicie</h1>
            },

            {
                path: 'kategorie',
                element: <h1>kategorie</h1>
            },

            {
                path: 'wykresy/kwota-zebrana-dzisiaj',
                element: <h1>wykresy/kwota-zebrana-dzisiaj</h1>
            },

            {
                path: 'wykresy/kwota-zebrana-calkowicie',
                element: <h1>wykresy/kwota-zebrana-calkowicie</h1>
            },

        ]
    },
    {
        path: '*',
        element: <h1>Page Not found 404</h1>
    }
])

export default router;