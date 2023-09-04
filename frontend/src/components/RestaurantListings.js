import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

const RestaurantListings = () => {
  // State to store the list of restaurants
  const [restaurants, setRestaurants] = useState([]);

  // Simulate fetching data from the backend (replace with actual API calls)
  useEffect(() => {
    // Fetch nearby restaurants
    // Replace with your actual API endpoint for restaurant listings
    fetch('/api/nearby-restaurants')
      .then((response) => response.json())
      .then((data) => {
        setRestaurants(data);
      })
      .catch((error) => {
        console.error('Error fetching nearby restaurants:', error);
      });
  }, []);

  return (
    <div>
      <h2>Nearby Restaurants</h2>

      <div className="restaurant-list">
        {restaurants.map((restaurant) => (
          <div className="restaurant-card" key={restaurant.id}>
            <Link to={`/restaurant/${restaurant.id}`}>
              <img src={restaurant.imageUrl} alt={restaurant.name} />
              <h3>{restaurant.name}</h3>
              <p>{restaurant.cuisineType}</p>
              <p>Delivery Time: {restaurant.deliveryTime} mins</p>
              <div className="ratings">
                <span className="rating">{restaurant.rating}</span>
                <span className="star">&#9733;</span>
              </div>
            </Link>
          </div>
        ))}
      </div>
    </div>
  );
};

export default RestaurantListings;
