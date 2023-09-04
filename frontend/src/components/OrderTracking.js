import React, { useEffect, useState } from 'react';

function OrderTracking({ orderId }) {
  const [orderStatus, setOrderStatus] = useState('processing');
  const [estimatedDelivery, setEstimatedDelivery] = useState('');

  useEffect(() => {
    // Fetch order status and estimated delivery time from the backend API
    fetch(`/api/order/${orderId}`)
      .then((response) => response.json())
      .then((data) => {
        setOrderStatus(data.status);
        setEstimatedDelivery(data.estimatedDelivery);
      })
      .catch((error) => {
        console.error('Error fetching order status:', error);
      });
  }, [orderId]);

  return (
    <div>
      <h2>Order Tracking</h2>
      <p>Status: {orderStatus}</p>
      <p>Estimated Delivery: {estimatedDelivery}</p>
    </div>
  );
}

export default OrderTracking;
