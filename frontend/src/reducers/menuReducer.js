
const initialState = {
    menu: [], // Your menu data
    cart: [],
  };
  
  const menuReducer = (state = initialState, action) => {
    switch (action.type) {
      case 'ADD_TO_CART':
        const updatedCart = [...state.cart];
        const existingItem = updatedCart.find((cartItem) => cartItem.id === action.payload.id);
  
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          updatedCart.push({ ...action.payload, quantity: 1 });
        }
  
        return {
          ...state,
          cart: updatedCart,
        };
  
      // Add more cases for other actions (e.g., REMOVE_FROM_CART)
  
      default:
        return state;
    }
  };
  
  export default menuReducer;