import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import Axios from 'axios';

const HomeScreen = () => {
  // State to store data (e.g., featured restaurants)
  const [featuredRestaurants, setFeaturedRestaurants] = useState([]);
  const [promotions, setPromotions] = useState([]);
  const [recentOrders, setRecentOrders] = useState([]);

  // Simulate fetching data from the backend (replace with actual API calls)
  useEffect(() => {
    // Fetch featured restaurants
    // Replace with your actual API endpoint for featured restaurants
    /*fetch('http://127.0.0.1:8000/api/restaurants')
      .then((response) => response.json())
      .then((data) => {
        setFeaturedRestaurants(data);
        console.log(data);
      })
      .catch((error) => {
        console.error('Error fetching featured restaurants:', error);
      });*/

      Axios.get('http://127.0.0.1:8000/api/restaurants')
      .then(response => {
        setFeaturedRestaurants(response.data);
        console.log(response.data);
      })
      .catch(err => {
        console.error("Error fetching featured restaurants:", err);        
      });

    // Fetch promotions
    // Replace with your actual API endpoint for promotions
    fetch('/api/promotions')
      .then((response) => response.json())
      .then((data) => {
        setPromotions(data);
      })
      .catch((error) => {
        console.error('Error fetching promotions:', error);
      });

    // Fetch recent orders
    // Replace with your actual API endpoint for recent orders
    fetch('/api/recent-orders')
      .then((response) => response.json())
      .then((data) => {
        setRecentOrders(data);
      })
      .catch((error) => {
        console.error('Error fetching recent orders:', error);
      });
  }, []);

  return (
    <div>
      <h2>Welcome to Food Delivery App</h2>

      {/* Featured Restaurants */ }
      <section>
        <h3>Featured Restaurants</h3>
        <div className="restaurant-list">
          {featuredRestaurants.map((restaurant) => (
            <div className="restaurant-card" key={restaurant.id}>
              <Link to={`/restaurant/${restaurant.id}`}>
                <img src={restaurant.imageUrl} alt={restaurant.name} />
                <h4>{restaurant.name}</h4>
                <p>{restaurant.description}</p>
              </Link>
            </div>
          ))}
        </div>
      </section>

      {/* Promotions */}
      <section>
        <h3>Promotions</h3>
        <div className="promotion-list">
          {promotions.map((promotion) => (
            <div className="promotion-card" key={promotion.id}>
              <h4>{promotion.title}</h4>
              <p>{promotion.description}</p>
            </div>
          ))}
        </div>
      </section>

      {/* Recent Orders */}
      <section>
        <h3>Recent Orders</h3>
        <div className="order-list">
          {recentOrders.map((order) => (
            <div className="order-card" key={order.id}>
              <h4>Order #{order.orderNumber}</h4>
              <p>Items: {order.itemCount}</p>
              <p>Total: ${order.totalAmount}</p>
            </div>
          ))}
        </div>
      </section>
    </div>
  );
};

export default HomeScreen;
