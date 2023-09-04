// index.js

import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { configureStore } from '@reduxjs/toolkit'; // Import configureStore
import rootReducer from './reducers';

import App from './App';

// Create the Redux store using configureStore
const store = configureStore({
  reducer: rootReducer,
  // Add other configuration options as needed (e.g., middleware)
});

ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById('root')
);
