import axios from 'axios';
import Chart from 'chart.js';
import { getDom } from '../pages/lib';

const charts = () => {
   const ordersCanvas = getDom('#orders');
   const revenueCanvas = getDom('#revenue');

   const orderLabels = [];
   const revenueLabels = [];
   const orderData = [];
   const revenueData = [];

   axios
      .get('/admin/charts')
      .then((response) => {
         response.data.orders.forEach((monthly) => {
            orderLabels.push(monthly.new_date);
            orderData.push(monthly.count);
         });

         response.data.revenue.forEach((monthly) => {
            revenueLabels.push(monthly.new_date);
            revenueData.push(monthly.amount);
         });

         const orderChart = new Chart(ordersCanvas, {
            type: 'line',
            data: {
               labels: orderLabels,
               datasets: [
                  {
                     label: '# Orders',
                     data: orderData,
                     backgroundColor: ['#81c784'],
                  },
               ],
            },
         });

         const revenueChart = new Chart(revenueCanvas, {
            type: 'bar',
            data: {
               labels: revenueLabels,
               datasets: [
                  {
                     label: '# Revenue',
                     data: revenueData,
                     backgroundColor: [
                        '#0d47a1',
                        '#ff6384',
                        '#3bc0c0',
                        '#ffc356',
                        '#1b5d20',
                        '#36a23b',
                        '#311b92',
                        '#dd2c00',
                        '#263238',
                        '#81c784',
                        '#b9f6ca',
                        '#f57c00',
                     ],
                  },
               ],
            },
         });
      })
      .catch(err => console.log(err));
};

const dashboard = () => {
   charts();
   // setInterval(charts, 5000);
};

export default dashboard;
