import React, { useState, useEffect } from 'react';
import { connect, useDispatch, useSelector } from 'react-redux';
import { addToCart } from '../actions/menuActions'; // Import your Redux actions

function MenuSelection({ menu, addToCart }) {
  const [localMenu, setLocalMenu] = useState([]);
  const [cart, setCart] = useState([]);

  const dispatch = useDispatch();
  const reduxMenu = useSelector(state => state.menu);

  useEffect(() => {
    // Fetch menu items from the backend API
    fetch('/api/menu')
      .then(response => response.json())
      .then(data => {
        setLocalMenu(data);
      })
      .catch(error => {
        console.error('Error fetching menu:', error);
      });

    // Fetch menu items from the backend API for Redux version (replace with your API call)
    // dispatch(fetchMenuItems());
  }, [dispatch]);

  const handleAddToCart = item => {
    addToCart(item); // For Redux version
    const updatedCart = [...cart];
    const existingItem = updatedCart.find(cartItem => cartItem.id === item.id);

    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      updatedCart.push({ ...item, quantity: 1 });
    }

    setCart(updatedCart);
  };

  const mergedMenu = reduxMenu.length > 0 ? reduxMenu : localMenu;

  return (
    <div>
      <h2>Menu Selection</h2>
      {mergedMenu.map(item => (
        <div key={item.id}>
          <h3>{item.name}</h3>
          <p>{item.description}</p>
          <p>${item.price}</p>
          <button onClick={() => handleAddToCart(item)}>Add to Cart</button>
        </div>
      ))}
    </div>
  );
}

const mapStateToProps = state => ({
  menu: state.menu,
});

export default connect(mapStateToProps, { addToCart })(MenuSelection);
