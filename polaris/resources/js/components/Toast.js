import React, { Component } from 'react';
import {Frame, Page, Toast, Button} from '@shopify/polaris';

class Toast_ extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            showToast: false,
        };

        this.toggleToast = this.toggleToast.bind(this);
    }

    toggleToast() {
        this.setState({
            showToast: !this.state.showToast,
        })
    }

    render() {
        return(
            <div style={{height: '250px'}}>
                <Frame>
                    <Page title="Toast example">
                        <Button onClick={this.toggleToast}>Show Toast</Button>
                        {this.setState.toggleToast}
                        { this.state.showToast ? (
                            <Toast content="Message sent" onDismiss={this.toggleToast} />
                        ) : (
                            null
                        )}
                    </Page>
                </Frame>
            </div>
        )
    }
}

export default Toast_;
