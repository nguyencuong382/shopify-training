import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Toast_ from './Toast';
import '@shopify/polaris/styles.css';
import {AppProvider, Page, Card, Button} from '@shopify/polaris';

class Root extends Component {
    render() {
        return (
            <div>
                <AppProvider>
                    <Toast_></Toast_>
                </AppProvider>
                
            </div>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Root />, document.getElementById('root'));
}
