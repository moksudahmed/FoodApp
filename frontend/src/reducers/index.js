// reducers/index.js

import { combineReducers } from 'redux';
import menuReducer from './menuReducer';

const rootReducer = combineReducers({
  menu: menuReducer,
  // Add other reducers here if needed
});

export default rootReducer;
