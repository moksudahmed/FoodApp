import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

const RestaurantDetails = () => {
  const { id } = useParams(); // Extract restaurant ID from the URL parameter

  // State to store restaurant details
  const [restaurant, setRestaurant] = useState(null);

  // Simulate fetching data from the backend (replace with actual API calls)
  useEffect(() => {
    // Fetch restaurant details by ID
    // Replace with your actual API endpoint for restaurant details
    fetch(`/api/restaurant/${id}`)
      .then((response) => response.json())
      .then((data) => {
        setRestaurant(data);
      })
      .catch((error) => {
        console.error('Error fetching restaurant details:', error);
      });
  }, [id]);

  // Render loading message while data is being fetched
  if (!restaurant) {
    return <p>Loading...</p>;
  }

  return (
    <div>
      <h2>{restaurant.name}</h2>
      <img src={restaurant.imageUrl} alt={restaurant.name} />
      <p>{restaurant.description}</p>

      {/* Menu */}
      <h3>Menu</h3>
      <ul>
        {restaurant.menu.map((menuItem) => (
          <li key={menuItem.id}>
            <h4>{menuItem.name}</h4>
            <p>{menuItem.description}</p>
            <p>Price: ${menuItem.price}</p>
          </li>
        ))}
      </ul>

      {/* Reviews */}
      <h3>Reviews</h3>
      <ul>
        {restaurant.reviews.map((review) => (
          <li key={review.id}>
            <h4>{review.user}</h4>
            <p>{review.comment}</p>
            <p>Rating: {review.rating}/5</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default RestaurantDetails;
