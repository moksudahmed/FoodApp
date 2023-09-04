import React, { useState } from 'react';

function Checkout({ cart, clearCart }) {
  const [address, setAddress] = useState('');
  const [paymentMethod, setPaymentMethod] = useState('creditCard');

  const handlePayment = () => {
    // Implement payment processing and order placement logic here
    // Send cart, address, and paymentMethod to the backend API
    // Clear the cart and show a confirmation message
    clearCart();
  };

  return (
    <div>
      <h2>Checkout and Payment</h2>
      <label>
        Delivery Address:
        <input
          type="text"
          value={address}
          onChange={(e) => setAddress(e.target.value)}
        />
      </label>
      <label>
        Payment Method:
        <select
          value={paymentMethod}
          onChange={(e) => setPaymentMethod(e.target.value)}
        >
          <option value="creditCard">Credit Card</option>
          <option value="paypal">PayPal</option>
        </select>
      </label>
      <button onClick={handlePayment}>Place Order</button>
    </div>
  );
}

export default Checkout;
