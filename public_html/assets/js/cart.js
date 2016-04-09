/**
 * Cart.js
 * cart object that writes cookies on the front end
 * to keep track of shopping cart
 *
 */

var Cart = {

    /**
     * init
     *
     * constructor - pass in the products.json object
     * so cart has a reference to products
     * @param products
     */
    init: function(products) {
        this.products = products;
    },

    /**
     * products
     *
     * where products.json will be kept
     */
    products: {},

    /**
     * items
     *
     * cart object
     */
    items: {},
    /* save Cart object string as a cookie */
    save: function() {
        //prepend items= and save it to cookie
        var CartJSONString = "items=" + JSON.stringify(this.items);
        document.cookie = CartJSONString;
    },

    /**
     * get
     *
     * gets current cart from browser cookies
     * and sets this.items (cart object)
     */
    get: function() {
        console.log(document.cookie);
        //get cookies
        var cookies = document.cookie;
        //remove items= in the beginning of cookies
        var cartItems = cookies.replace('items=', '');
        //check to see if empty
        if(cartItems != '') {
            //convert to json and set items
            this.items = JSON.parse(cartItems);
        }
    },

    /**
     * add
     *
     * adds an item to the cart
     *
     * example usage:
     * cart.add("men","bottoms","pendleton-compass-5-pocket-pants",3);
     */
    add: function(gender, category, item, qty) {
        console.log(category, item, qty);
        if (this.items[gender] === undefined) {
            this.items[gender] = {};
        }

        if(this.items[gender][category] === undefined) {
            this.items[gender][category] = {};
        }

        this.items[gender][category][item] = parseInt(qty);

        alert('Item has been added');
        this.save();
        console.log(this);
    },

    /**
     * total
     *
     * calculates total from the cart
     * @returns {number}
     */
    total: function() {
        var total = 0;

        for (var gender in this.items) {
            for (var categories in this.items[gender]) {

                for(var items in this.items[gender][categories]){

                    total += this.products[gender][categories][items].price * this.items[gender][categories][items];
                }
            }
        }

        return total;

    },

    /**
     * getCart
     *
     * todo finish later when we have a clearer idea how to use
     * returns the contents of the cart to be parsed on the front end
     *
     */
    getCart: function() {
        // todo finish out later

        /*
        var string = '';
        for (var categories in this.items) {

            for(var items in this.items[categories]){
                string += '<b>' + Products[categories][items].Name + '</b><br/>';
                string += '<b>Price:</b> ' + Products[categories][items].Price + '<br/>';
                string += '<b>Qty:</b> ' + this.items[categories][items] + ' <br/><br/>';
            }
        }

        if (string === '') {
            return 'Cart is empty!';
        }

        string += '<h2>Total: $' + this.total() + '</h2>';
        return string;*/

    },

    /**
     * clear
     *
     * empties cart items
     * and saves the cookie as empty
     */
    clear: function() {
        this.items = {};
        //clear cookies
        document.cookie = "items={}";
    },
};
