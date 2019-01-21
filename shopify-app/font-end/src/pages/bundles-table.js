import React, { Component } from 'react';
import { Select, Button } from '@shopify/polaris';
import { connect } from 'react-redux';
import RowBundlesTable from './row-bundles-table';

export class BundlesTable extends Component {
  constructor(props) {
    super(props);

    this.state = {
      selected: 'today',
    };
  }

  componentDidMount() {
    this.props.getAllBundles();
    console.log(this.state);
  }

  handleChange = (newValue) => {
    this.setState({ selected: newValue });
  };


  render() {
    const options = [
      { label: 'Today', value: 'today' },
      { label: 'Yesterday', value: 'yesterday' },
      { label: 'Last 7 days', value: 'lastWeek' },
    ];

    return (
      <section className="content container-fluid">
        <div className="box">
          <div className="box-header">
            <div className="action_bundles">
              <Select
                options={options}
                onChange={this.handleChange}
                value={this.state.selected}
              />
              <Button>Apply</Button>
            </div>

            <div className="action_bundles">
              <Button>Sync Inventory</Button>
              <Button>Video introduction</Button>
            </div>
          </div>
          <div className="box-body table-responsive no-padding">
            <table className="table table-hover">
              <tbody>
                <tr>
                  <th>
                    <div className="checkbox">
                      <label>
                        <input type="checkbox" defaultValue />
                        Name
                      </label>
                    </div>
                  </th>
                  <th className="w-100" />
                  <th className="w-150">Stats (30 days)</th>
                  <th className="w-100" />
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                {this.props.bundles.map((item, index) => (
                  <RowBundlesTable key={{ index }} data={{ item }} />
                ))}

              </tbody>
            </table>
          </div>
        </div>
      </section>
    );
  }
}

const mapStateToProps = state => ({
  bundles: state.bundlesReducer.bundles,
});

const mapDispatchToProps = dispatch => ({
  getAllBundles: () => dispatch({ type: 'FETCH_ALL_BUNDLES_SAGA' }),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(BundlesTable);
