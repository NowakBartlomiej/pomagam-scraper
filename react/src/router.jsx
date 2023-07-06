import {createBrowserRouter} from 'react-router-dom'
import App from './App';
import TablePage from './pages/TablePage';
import { TodayCollectedPage } from './pages/TodayCollectedPage';
import { TotalSumPage } from './pages/TotalSumPage';
import CategoriesPage from './pages/CategoriesPage';
import { TodayCollectedChartPage } from './pages/charts/TodayCollectedChartPage';
import TotalSumChartPage from './pages/charts/TotalSumChartPage';

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
                element: <TodayCollectedPage/>
            },

            {
                path: 'kwota-zebrana-calkowicie',
                element: <TotalSumPage />
            },

            {
                path: 'kategorie',
                element: <CategoriesPage />
            },

            {
                path: 'wykresy/kwota-zebrana-dzisiaj',
                element: <TodayCollectedChartPage />
            },

            {
                path: 'wykresy/kwota-zebrana-calkowicie',
                element: <TotalSumChartPage />
            },

        ]
    },
    {
        path: '*',
        element: <h1>Page Not found 404</h1>
    }
])

export default router;