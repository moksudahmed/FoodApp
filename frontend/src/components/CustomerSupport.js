// components/CustomerSupport.js

import React, { useState } from 'react';
import { sendInquiry } from '../api/support'; // Replace with your API function

function CustomerSupport() {
  const [inquiry, setInquiry] = useState('');
  const [submitted, setSubmitted] = useState(false);

  const handleInquirySubmit = () => {
    // Send inquiry to the backend API
    sendInquiry(inquiry)
      .then(() => {
        setInquiry('');
        setSubmitted(true);
      })
      .catch((error) => {
        console.error('Error sending inquiry:', error);
      });
  };

  return (
    <div>
      <h2>Customer Support</h2>
      {/* Render a contact form */}
    </div>
  );
}

export default CustomerSupport;
