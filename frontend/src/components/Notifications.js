// components/Notifications.js

import React, { useEffect, useState } from 'react';
import { fetchNotifications } from '../api/notifications'; // Replace with your API functions

function Notifications() {
  const [notifications, setNotifications] = useState([]);

  useEffect(() => {
    // Fetch notifications from the backend API
    fetchNotifications()
      .then((data) => {
        setNotifications(data);
      })
      .catch((error) => {
        console.error('Error fetching notifications:', error);
      });
  }, []);

  return (
    <div>
      <h2>Notifications</h2>
      {/* Render notifications */}
    </div>
  );
}

export default Notifications;
