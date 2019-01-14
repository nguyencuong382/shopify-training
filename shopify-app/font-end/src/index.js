import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import { Provider } from 'react-redux';
import {
  AppProvider, Page, Card, Button,
} from '@shopify/polaris';
import App from './App';
import configureStore from './redux/store';
import './scss/app.scss';
import '@shopify/polaris/styles.css';

const rootElement = document.getElementById('root');

const store = configureStore();

ReactDOM.render(
  <Provider store={store}><AppProvider><App /></AppProvider></Provider>,

  rootElement,
);
