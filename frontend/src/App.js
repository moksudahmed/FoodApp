import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import HomeScreen from './components/HomeScreen';
import RestaurantListings from './components/RestaurantListings';
import RestaurantDetails from './components/RestaurantDetails';
import PageNotFound from './components/PageNotFound';
import MenuSelection from './components/MenuSelection';
import ShoppingCart from './components/ShoppingCart';
import Checkout from './components/Checkout';
import OrderTracking from './components/OrderTracking';
// ... Import other components

function App() {
  return (  
      <Router>   
     <Routes>
        <Route path="/" element={<HomeScreen />}>
          <Route index element={<HomeScreen />} />
          <Route path="/restaurants" element={<RestaurantListings />} />
          <Route path="/restaurant/:id" element={<RestaurantDetails />} />
          <Route path="/" element={<MenuSelection />} />
          <Route path="/cart" element={<ShoppingCart />} />
          <Route path="/checkout" element={<Checkout />} />
          <Route path="/order/:id" element={<OrderTracking />} />
          <Route path="*" element={<PageNotFound />} />
        </Route>
      </Routes>
      </Router>    
  );
}

export default App;
