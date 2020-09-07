import React, { Component } from 'react';
import httpInstance from '../helpers/http-helper';
import { Button } from 'react-bootstrap';

class FSItem extends Component {

    state = {
        loading: true,
        item: null,
        requesting: false
    }

    fetchItems() {
        return httpInstance.get("/api/getItemsFS")
            .then(res => {
                this.setState({ loading: false });
                this.setState({ item: res.data[0] });
                return res.data;
            }).catch(err => {
                console.log("Unable to fetch items");
            });
    }

    render() {
        return (
            <div>

                {this.state.loading || !this.state.item ?
                    (<div> Fetching data... </div>) :
                    (
                        <div>
                            <div>Flash sale is on!</div>
                            <div id="header"></div>
                            <div className="container">
                                <div className="column">
                                    <img src={this.state.item.photoUrl} className="img-responsive" />
                                    <p>{this.state.item.name}</p>
                                    {
                                        this.state.item.inStockCount == 0 ?
                                            <div> Out Of Stock! </div> :
                                            <div>
                                                <Button
                                                    className="btn-success"
                                                    onClick={this.tryAddingItemToCart}
                                                >
                                                    Try Adding to Cart
                                                </Button>
                                            </div>
                                    }
                                </div>
                            </div>
                        </div>
                    )
                }
            </div>)
    }



    componentDidMount() {
        this.fetchItems()
            .then(data => {
                console.log(data);
                console.log("fetched successfully");
            }).catch(err => console.log(` Fetch error : ${err}`));
    }



    tryAddingItemToCart = () => {
        const dataToSend = this.state.item;
        httpInstance.post('/api/tryAddToCart',
            dataToSend
        ).then(data => {
            console.log(data);
            return this.fetchItems();
        }).then(data => {
            console.log(data);
            console.log("fetched successfully");
        }).catch(err => console.log(` Fetch error : ${err}`));
    }



}

export default FSItem