// components/OrderHistory.js

import React, { useEffect, useState } from 'react';
import { fetchOrderHistory } from '../api/orders'; // Replace with your API functions

function OrderHistory() {
  const [orderHistory, setOrderHistory] = useState([]);

  useEffect(() => {
    // Fetch order history from the backend API
    fetchOrderHistory()
      .then((data) => {
        setOrderHistory(data);
      })
      .catch((error) => {
        console.error('Error fetching order history:', error);
      });
  }, []);

  return (
    <div>
      <h2>Order History</h2>
      {/* Render order history data */}
    </div>
  );
}

export default OrderHistory;
