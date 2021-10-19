import Body from "./Body";
import Product from "./Product";

export default class OrderItem
{
    id: number;
    quantity: number;
    product: Product;

    price: number;   //cents
    volume: number;



    constructor (id: number, quantity: number, product: Product) {
        this.id = id;
        this.quantity = Math.max(1, quantity);
        this.product = product;

        this.calculatePrice();
        this.calculateVolume();
    }

    calculatePrice(){
        this.price = this.product.price * this.quantity;
    }

    calculateVolume(){
        this.volume = this.product.body.volume * this.quantity;
    }

}
