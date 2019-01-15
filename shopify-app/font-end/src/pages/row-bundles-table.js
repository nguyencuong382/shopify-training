import React, { Component } from 'react';
import Switch from 'react-ios-switch';
import { Popover, ActionList, Button } from '@shopify/polaris';

export default class RowBundlesTable extends Component {
  constructor(props) {
    super(props);

    this.state = {
      checked: false,
      active: false,
    };
  }

  togglePopover = () => {
    this.setState({
      active: !this.state.active,
    });
  };

  statusChange = () => {
    this.setState({
      checked: !this.state.checked,
    });
  }

  render() {
    const activator = (
      <Button onClick={this.togglePopover}>More actions</Button>
    );

    return (
      <tr className="row-bundles-table">
        <td>
          <div className="checkbox">
            <label>
              <input type="checkbox" defaultValue />
                        Bundle 1
            </label>
          </div>
        </td>
        <td>
          <div className="stat">
            <p className="stat__value">1</p>
            <p className="stat__type">VISITORS</p>
          </div>
        </td>
        <td>
          <div className="stat">
            <p className="stat__value">1</p>
            <p className="stat__type">ADD TO CART</p>
          </div>
        </td>
        <td>
          <div className="stat">
            <p className="stat__value">1</p>
            <p className="stat__type">SALES</p>
          </div>
        </td>
        <td>
          <Switch
            checked={this.state.checked}
            onChange={this.statusChange}
          />
        </td>
        <td>
          <Popover
            active={this.state.active}
            activator={activator}
            onClose={this.togglePopover}
          >
            <ActionList
              items={[
                {
                  content: 'Import file',
                  onAction: () => {
                    console.log('File imported');
                  },
                },
                {
                  content: 'Export file',
                  onAction: () => {
                    console.log('File exported');
                  },
                },
              ]}
            />
          </Popover>
        </td>
      </tr>
    );
  }
}
